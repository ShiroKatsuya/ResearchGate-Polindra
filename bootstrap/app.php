<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'require.auth' => \App\Http\Middleware\RequireAuth::class,
            'custom.auth' => \App\Http\Middleware\CustomAuth::class,
            'handle.tunnel.csrf' => \App\Http\Middleware\HandleTunnelCsrf::class,
            'trust.proxies' => \App\Http\Middleware\TrustProxies::class,
        ]);
        
        // Add global middleware for tunnel handling
        $middleware->prepend(\App\Http\Middleware\TrustProxies::class);
        $middleware->append(\App\Http\Middleware\HandleTunnelCsrf::class);
        
        // Replace default CSRF middleware with our custom one
        $middleware->replace(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class, \App\Http\Middleware\VerifyCsrfToken::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
