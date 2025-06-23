<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }
} 