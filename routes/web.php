<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'customer'], function() {
    Route::get('/', function () {
        return view('index');
    })->name('index');
});


Auth::routes();



//Admin Route
Route::group(['prefix' => 'admin'], function(){

    //Guest Admin Route
    Route::get('login',[LoginController::class,'index'])->name('admin.login');

    Route::post('login/authenticate',[LoginController::class,'authenticate'])->name('admin.authenticate');

    //Authenticated Admin Route
    Route::group(['middleware'=> ['auth','admin']], function() {

        Route::post('logout', [LogoutController::class,'logout'])->name('admin.logout');

        Route::get('dasboard',[DashboardController::class,'index'])->name('admin.dashboard');

    }); 
    

});