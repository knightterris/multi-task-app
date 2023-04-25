<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomLogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('http://localhost:8080/login');
    }
}