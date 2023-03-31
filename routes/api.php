<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController as ApiMessageController;
use App\Http\Controllers\Api\SponsorshipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apartments', [ApartmentController::class, 'index'])->name('api.apartments.index');
Route::get('/apartments/{apartment}', [ApartmentController::class, 'show'])->name('api.apartments.show');

Route::post('/messages', [ApiMessageController::class, 'store'])->name('api.messages');

Route::get('/sponsorships', [SponsorshipController::class, 'index'])->name('api.sponsorships.index');
