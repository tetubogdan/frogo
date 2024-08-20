<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin' && $user->restaurant) {
            return redirect()->route('admin.dashboard', ['id' => $user->restaurant->id]);
        } elseif ($user->role === 'superadmin') {
            return redirect()->route('superadmin.restaurants');
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'No associated restaurant found.');
        }
    }
    
    

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}