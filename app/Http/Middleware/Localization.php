<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            session()->put('locale', session()->get('locale'));
        }
        else {

            $browserLanguage = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'en'; //read browser language

            if (in_array($browserLanguage, config('app.locales'))) {
                session()->put('locale', $browserLanguage);

            }
        }
        App::setLocale(session()->get('locale'));
        return $next($request);
    }
}
