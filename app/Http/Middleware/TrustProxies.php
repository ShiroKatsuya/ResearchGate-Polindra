<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrustProxies
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
        // Trust Cloudflare proxies
        $request->setTrustedProxies([
            '173.245.48.0/20',
            '103.21.244.0/22',
            '103.22.200.0/22',
            '103.31.4.0/22',
            '141.101.64.0/18',
            '108.162.192.0/18',
            '190.93.240.0/20',
            '188.114.96.0/20',
            '197.234.240.0/22',
            '198.41.128.0/17',
            '162.158.0.0/15',
            '104.16.0.0/13',
            '104.24.0.0/14',
            '172.64.0.0/13',
            '131.0.72.0/22',
        ], Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_HOST | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO | Request::HEADER_X_FORWARDED_AWS_ELB);

        // Set the correct scheme and host for tunnel requests
        if ($this->isCloudflareRequest($request)) {
            $request->server->set('HTTPS', 'on');
            $request->server->set('HTTP_X_FORWARDED_PROTO', 'https');
            
            // Log for debugging
            Log::info('Cloudflare request detected', [
                'ip' => $request->ip(),
                'forwarded_for' => $request->header('X-Forwarded-For'),
                'cf_connecting_ip' => $request->header('CF-Connecting-IP'),
                'cf_ray' => $request->header('CF-Ray'),
                'url' => $request->url()
            ]);
        }

        return $next($request);
    }

    /**
     * Check if the request is coming through Cloudflare
     */
    private function isCloudflareRequest(Request $request): bool
    {
        return $request->header('CF-Connecting-IP') || 
               $request->header('CF-Ray') || 
               $request->header('CF-Visitor') ||
               $request->header('CF-IPCountry');
    }
}
