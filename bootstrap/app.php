<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Render (and most PaaS hosts) terminate TLS at the edge and forward
        // plain HTTP to the container. Without trusting that proxy, Laravel
        // sees the request as insecure and generates http:// asset URLs, which
        // browsers then block as mixed content on the https:// page.
        $middleware->trustProxies(at: '*');

        $middleware->alias([
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
