<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\DashboardController;

Route::group(['as'=>'user.', 'middleware'=>['auth', 'emailVarify', 'is_user']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});