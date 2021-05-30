<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('super_admin/DashboardSuper');

        } else if (Auth::guard('klinik')->check()) {
            return redirect('admin_klinik/DashboardAdmin');
            
        }else if (Auth::guard('member')->check()) {
            return redirect('member/DashboardMember');
        }
    }
}