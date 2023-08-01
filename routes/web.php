<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MatchUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [UserController::class, 'index']);


Route::group(['prefix' => '{locale?}'], function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

});

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/temp', [RegisterController::class, 'temp'])->middleware('guest');
Route::get('/payment', [RegisterController::class, 'payment'])->middleware('guest');
Route::post('/payment', [RegisterController::class, 'makePayment'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::post('/addFriend', [WishlistController::class, 'store'])->middleware('auth');

Route::get('/notification', [WishlistController::class, 'notification'])->middleware('auth');

Route::post('/addMatch', [WishlistController::class, 'addMatch'])->middleware('auth');

Route::get('/friends', [MatchUserController::class, 'index'])->middleware('auth');

Route::get('/store', [AvatarController::class, 'index'])->middleware('auth');
Route::post('/buyAvatar', [AvatarController::class, 'buyavatar'])->middleware('auth');

Route::post('/topup', [UserController::class, 'topup'])->middleware('auth');
