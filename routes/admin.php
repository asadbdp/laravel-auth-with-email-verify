<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DashboardController;

Route::group(['as'=>'admin.', 'middleware'=>['auth', 'is_admin']], function(){
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
});




?>