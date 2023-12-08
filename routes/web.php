<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomCategoryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\HomeController;
use App\Models\RoomCategory;
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
    Route::get('/', [HomeController::class,'index'])->name('index');
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

        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

        Route::get('room_category', [RoomCategoryController::class,'index'])->name('admin.room_category.index');
        Route::get('room_category/create', [RoomCategoryController::class,'create'])->name('admin.room_category.create');
        Route::post('room_category/store', [RoomCategoryController::class,'store'])->name('admin.room_category.store');
        Route::get('room_category/{id}/edit',[RoomCategoryController::class,'edit'])->name('admin.room_category.edit');
        Route::put('room_category/{category}/update',[RoomCategoryController::class,'update'])->name('admin.room_category.update');


        Route::get('room', [RoomController::class,'index'])->name('admin.room.index');
        Route::get('room/create', [RoomController::class,'create'])->name('admin.room.create');
        Route::post('room/store', [RoomController::class,'store'])->name('admin.room.store');
        Route::get('room/{id}/edit', [RoomController::class,'edit'])->name('admin.room.edit');
        Route::put('room/{room}/update', [RoomController::class,'update'])->name('admin.room.update');
    }); 
    

});