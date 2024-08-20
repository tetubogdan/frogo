<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'superadmin') {
            // Afișează toate restaurantele
            $restaurants = \App\Models\Restaurant::all();
        } else {
            // Afișează doar restaurantul utilizatorului
            $restaurants = \App\Models\Restaurant::where('user_id', $user->id)->get();
        }

        return view('admin.dashboard', compact('restaurants'));
    }
}
