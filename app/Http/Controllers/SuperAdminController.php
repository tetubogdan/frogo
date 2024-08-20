<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;


class SuperAdminController extends Controller
{
    public function pendingRestaurants()
{
    $restaurants = Restaurant::where('is_active', false)->get();
    return view('superadmin.pending_restaurants', compact('restaurants'));
}

public function activateRestaurant($id)
{
    $restaurant = Restaurant::findOrFail($id);
    $restaurant->is_active = true;
    $restaurant->save();

    return redirect()->route('superadmin.pending_restaurants')->with('success', 'Restaurant activated successfully.');
}

}
