<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/home');
    }

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];
    }
} 