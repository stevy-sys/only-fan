<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = "en";
        if (auth()->check()) {
            $locale = $request->session()->get('locale') ?? auth()->user()->language ?? config('app.locale');
        }else{
            $locale = $request->session()->get('locale') ?? config('app.locale');
        }
        
        app()->setLocale($locale);
        session(['locale' => $locale]);
        return $next($request);
    }
}
