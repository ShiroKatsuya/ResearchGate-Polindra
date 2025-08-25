<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HandleTunnelCsrf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if request is coming through a tunnel (Cloudflare or similar)
        $isTunnel = $this->isTunnelRequest($request);
        
        if ($isTunnel) {
            // For tunnel requests, be more lenient with CSRF
            // This is a temporary fix for development/testing
            $request->headers->set('X-Requested-With', 'XMLHttpRequest');
            
            // Log tunnel access for debugging
            Log::info('Tunnel request detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->url(),
                'headers' => $request->headers->all()
            ]);
        }
        
        return $next($request);
    }
    
    /**
     * Check if the request is coming through a tunnel
     */
    private function isTunnelRequest(Request $request): bool
    {
        $userAgent = $request->userAgent();
        $forwardedFor = $request->header('X-Forwarded-For');
        $realIp = $request->header('X-Real-IP');
        $cfConnectingIp = $request->header('CF-Connecting-IP');
        
        // Check for Cloudflare headers
        if ($cfConnectingIp || $request->header('CF-Ray')) {
            return true;
        }
        
        // Check for common tunnel user agents
        $tunnelUserAgents = [
            'cloudflare',
            'tunnel',
            'ngrok',
            'localtunnel'
        ];
        
        if ($userAgent) {
            foreach ($tunnelUserAgents as $tunnelAgent) {
                if (stripos($userAgent, $tunnelAgent) !== false) {
                    return true;
                }
            }
        }
        
        // Check for forwarded IPs (common in tunnels)
        if ($forwardedFor || $realIp) {
            return true;
        }
        
        return false;
    }
}
