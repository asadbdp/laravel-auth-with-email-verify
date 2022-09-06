<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, //404 disable
]);

//---------------Auth----------------//
Route::get('register', [AuthController::class,'registerIndex']);
Route::post('register', [AuthController::class,'registerStore'])->name('register.store');

//-------------Email Verify----------//
Route::get('email/verify/{token}', [AuthController::class, 'emailVerify'])->name('user.email.verify');
