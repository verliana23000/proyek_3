<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/super_admin/DashboardSuper');

        } else if (Auth::guard('klinik')->check()) {
            return redirect('/admin_klinik/DashboardAdmin');

        }else if (Auth::guard('member')->check()) {
            return redirect('/member/DashboardMember');
        }
        return $next($request);
    }
}