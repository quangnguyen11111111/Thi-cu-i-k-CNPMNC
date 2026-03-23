<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('auth', 'auth/*')) {
            if (session('is_logged_in')) {
                return redirect('/')->with('success', 'Bạn đã đăng nhập rồi!');
            }

            return $next($request);
        }

        if (! session('is_logged_in')) {
            return redirect('/auth/login')->with('error', 'Vui lòng đăng nhập để truy cập trang này!');
        }

        return $next($request);

    }
}
