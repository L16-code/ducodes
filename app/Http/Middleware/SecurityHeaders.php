<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * The theme relies on inline <script>/<style> blocks throughout its
     * views, so this CSP allows 'unsafe-inline' for script-src/style-src
     * rather than shipping a broken page — it still meaningfully restricts
     * object embeds, frame ancestors, and which external origins can load
     * anything at all. Tightening further to a nonce-based policy would
     * require refactoring every inline script/style in the theme, which is
     * a separate, larger effort.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // The admin panel (purchased "Color Admin" theme) pulls Font Awesome,
        // Summernote, and other plugins from several external CDNs across
        // its many demo-derived pages — a moving target we don't fully
        // control. Rather than chase every CDN it might reference, admin
        // routes get a more permissive script/style allowance here; they're
        // authenticated-only (AdminMiddleware) so the exposure is limited to
        // trusted staff, not the public internet.
        $isAdmin = $request->is('admin/*') || $request->is('admin');

        // Analytics origins are allow-listed even though no snippet fires by
        // default (see config/services.php 'analytics' — every ID is null
        // until you set one in .env). This just means CSP won't silently
        // block GTM/GA4/Clarity/Meta Pixel/LinkedIn Insight the moment a
        // real ID is added later.
        $csp = implode('; ', [
            "default-src 'self'",
            $isAdmin
                ? "script-src 'self' 'unsafe-inline' https:"
                : "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://www.clarity.ms https://connect.facebook.net https://snap.licdn.com",
            $isAdmin
                ? "style-src 'self' 'unsafe-inline' https:"
                : "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            $isAdmin ? "font-src 'self' https: data:" : "font-src 'self' https://fonts.gstatic.com",
            "img-src 'self' data: https:",
            "connect-src 'self' https://www.google-analytics.com https://www.clarity.ms https://www.facebook.com https://px.ads.linkedin.com",
            "frame-src 'self' https://www.google.com https://www.googletagmanager.com",
            "object-src 'none'",
            "base-uri 'self'",
            "frame-ancestors 'self'",
        ]);

        $response->headers->set('Content-Security-Policy', $csp);
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000');
        }

        return $response;
    }
}
