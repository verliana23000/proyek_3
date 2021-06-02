<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginPost(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/super_admin/DashboardSuper');

        } else if (Auth::guard('klinik')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin_klinik/DashboardAdmin');
        }

        else if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/member/DashboardMember');
        }else {
            return 'Login Gagal';
        }
    }

    function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();

        } else if (Auth::guard('klinik')->check()) {
            Auth::guard('klinik')->logout();
        }
        
        else if (Auth::guard('member')->check()) {
            Auth::guard('member')->logout();
        }
        return redirect('/')->with('alert-success', 'Kamu sudah logout');
    }
}