<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\RoomCategoryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController as ControllersPaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController as ControllersRoomController;
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

//Customer Route
Route::group(['middleware' => 'customer'], function() {
    Route::get('/', [HomeController::class,'index'])->name('index');
    Route::get('/rooms', [ControllersRoomController::class,'index'])->name('room.index');
    Route::get('/room/{id}/details', [ControllersRoomController::class,'show'])->name('room.show');

    Route::group(['middleware' => 'auth'], function() {

        Route::post('room/{id}/reserve', [ReservationController::class,'store'])->name('room.reserve');
        Route::get('reservations', [ReservationController::class,'index'])->name('reservation.index');
        Route::put('reservations/{reservation}/cancel', [ReservationController::class,'cancel'])->name('reservation.cancel');

        Route::get('bookings', [ControllersBookingController::class,'index'])->name('booking.index');

        Route::post('booking/{id}/pay/e-wallet', [ControllersPaymentController::class,'payEWallet'])->name('payment.pay.ewallet');
        Route::post('booking/{id}/pay/credit_card', [ControllersPaymentController::class,'payCreditCard'])->name('payment.pay.credit_card');
    });

  
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


        Route::get('reservation/pending',[AdminReservationController::class,'pending_index'])->name('admin.reservation.pending.index');
        Route::post('reservation/{reservation}/approve', [AdminReservationController::class,'approveReservation'])->name('admin.reservation.approve');
        Route::put('reservation/{reservation}/reject', [AdminReservationController::class,'rejectReservation'])->name('admin.reservation.reject');

        Route::get('reservation/approved',[AdminReservationController::class,'approved_index'])->name('admin.reservation.approved.index');

        Route::get('reservation/cancelled',[AdminReservationController::class,'cancelled_index'])->name('admin.reservation.cancelled.index');

        Route::get('reservation/rejected',[AdminReservationController::class,'rejected_index'])->name('admin.reservation.rejected.index');

        Route::get('booking/on-going', [BookingController::class,'ongoing_booking_index'])->name('admin.booking.on-going.index');
        Route::post('booking/{id}/pay/cash', [PaymentController::class,'payCash'])->name('admin.payment.pay.cash');
        Route::post('booking/{booking}/complete', [BookingController::class,'complete_booking'])->name('admin.booking.complete');

        Route::get('booking/completed', [BookingController::class,'completed_booking_index'])->name('admin.booking.completed');

    }); 
    

});