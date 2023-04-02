<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageCreatePostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // МЕТОД ПРОВЕРЯЕТ ЗАПРОС
    public function handle(Request $request, Closure $next)
    {
        // логика проверки по условию
        // если пользователь не админ, редирект на главную
        if(auth()->user()->role !== 'admin') {
            return redirect('/');
        }

        // если проверка прошла, выполняется слудующий return
        return $next($request);
    }
}
