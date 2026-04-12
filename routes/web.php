<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TripPosterController;
use App\Http\Controllers\LeadController;


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

// Public API endpoint for distance calculation
Route::post('/calculate-distance', [DistanceController::class, 'calculateDistance'])
    ->name('distance.calculate');

Route::post('/enquiry', [App\Http\Controllers\EnquiryController::class, 'store'])
    ->name('enquiry.store');

Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])
    ->name('leads.store');


Auth::routes();

Route::get('/admin/login', function() {
    return view('auth.real_login');
})->name('admin.login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('trip-posters', TripPosterController::class);
    Route::get('leads', [App\Http\Controllers\LeadController::class, 'index'])->name('leads.index');
});
