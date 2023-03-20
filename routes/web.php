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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::resource('/apartments', ApartmentController::class);
});

Route::get('/user/sponsorship', [SponsorshipController::class, 'index'])->name('user.sponsorship.index');

Route::get('/user/message', [MessageController::class, 'index'])->name('user.message.index');
Route::get('/user/message/{message}', [MessageController::class, 'show'])->name('user.message.show');


require __DIR__ . '/auth.php';
