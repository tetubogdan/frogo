<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantException;


class RestaurantController extends Controller
{
    public function index()
    {
        // Simplu return view pentru testare
        return view('restaurants.index');
    }

    public function editSchedule($id)
{
    $restaurant = Restaurant::findOrFail($id);
    return view('admin.restaurant_schedule', compact('restaurant'));
}

public function updateSchedule(Request $request, $id)
{
    $restaurant = Restaurant::findOrFail($id);

    // Logică pentru a salva programul în baza de date

    return redirect()->back()->with('success', 'Schedule updated successfully.');
}

public function updateLogo(Request $request, $id)
{
    $restaurant = Restaurant::findOrFail($id);

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $filename = time() . '.' . $logo->getClientOriginalExtension();
        $path = $logo->storeAs('public/logos', $filename);

        // Salvează calea logo-ului în baza de date
        $restaurant->logo = $filename;
        $restaurant->save();
    }

    return redirect()->back()->with('success', 'Logo updated successfully.');
}



public function editExceptions($id)
{
    $restaurant = Restaurant::findOrFail($id);
    return view('admin.restaurant_exceptions', compact('restaurant'));
}

public function updateExceptions(Request $request, $id)
{
    $restaurant = Restaurant::findOrFail($id);

    foreach ($request->exceptions as $date => $is_closed) {
        RestaurantException::updateOrCreate(
            ['restaurant_id' => $restaurant->id, 'date' => $date],
            ['is_closed' => $is_closed]
        );
    }

    return redirect()->back()->with('success', 'Exceptions updated successfully.');
}


}
