<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Adaugă această linie
use App\Http\Controllers\SuperAdminController; // Adaugă această linie
use App\Http\Controllers\RestaurantController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;



Auth::routes();


Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

Route::resource('restaurants', RestaurantController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth');


Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware(['auth', CheckRole::class . ':superadmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index']);
});

Route::get('/superadmin/restaurants/pending', [SuperAdminController::class, 'pendingRestaurants'])->name('superadmin.pending_restaurants');
Route::post('/superadmin/restaurants/activate/{id}', [SuperAdminController::class, 'activateRestaurant'])->name('superadmin.activate_restaurant');

Route::get('/admin/restaurant/{id}/schedule', [RestaurantController::class, 'editSchedule'])->name('admin.editSchedule');
Route::post('/admin/restaurant/{id}/schedule', [RestaurantController::class, 'updateSchedule'])->name('admin.updateSchedule');

Route::get('/admin/restaurant/{id}/exceptions', [RestaurantController::class, 'editExceptions'])->name('admin.editExceptions');
Route::post('/admin/restaurant/{id}/exceptions', [RestaurantController::class, 'updateExceptions'])->name('admin.updateExceptions');

Route::get('/admin/restaurant/{id}/dashboard', [App\Http\Controllers\RestaurantController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/restaurant/{id}/customizations', [App\Http\Controllers\RestaurantController::class, 'editCustomizations'])->name('admin.editCustomizations');
Route::post('/admin/restaurant/{id}/customizations', [App\Http\Controllers\RestaurantController::class, 'updateCustomizations'])->name('admin.updateCustomizations');





