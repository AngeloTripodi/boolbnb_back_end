<?php

use App\Http\Controllers\User\ApartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SponsorshipController as SponsorshipController;
use App\Http\Controllers\User\MessageController as MessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::patch('/apartment/{apartment}/toggle', [ApartmentController::class, 'enableToggle'])->name('toggle');
    Route::resource('/apartments', ApartmentController::class);
})->name('user.apartments.index');

Route::get('/user/sponsorship', [SponsorshipController::class, 'index'])->name('user.sponsorship.index');

Route::get('/user/messages', [MessageController::class, 'index'])->name('user.messages.index');
Route::get('/user/messages/{message}', [MessageController::class, 'show'])->name('user.messages.show');


require __DIR__ . '/auth.php';
