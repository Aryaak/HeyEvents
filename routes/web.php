<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search/{category?}', [EventController::class, 'search'])->name('event.search');
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('create', [EventController::class, 'create'])->name('event.create');
    Route::post('event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('joined/{category?}', [EventController::class, 'joined'])->name('event.joined');
    Route::get('manage/{category?}', [EventController::class, 'manage'])->name('event.manage');
    Route::post('event/join', [EventController::class, 'join'])->name('event.join');
    Route::post('event/leave', [EventController::class, 'leave'])->name('event.leave');
    Route::post('event/save', [EventController::class, 'save'])->name('event.save');
    Route::delete('event/unsave', [EventController::class, 'unsave'])->name('event.unsave');
    Route::post('event/pay', [EventController::class, 'pay'])->name('event.pay');
    Route::post('event/accept', [EventController::class, 'accept'])->name('event.accept');
    Route::delete('event/reject', [EventController::class, 'reject'])->name('event.reject');
    
    Route::get('discussion/{slug}', [DiscussionController::class, 'discussions'])->name('event.discussion');
    Route::post('discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');
    
    Route::get('profile/show/{slug?}/{category?}', [UserController::class, 'profile'])->name('profile');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('profile/verification', [UserController::class, 'verification'])->name('profile.verification');
    Route::post('profile/verification/send', [UserController::class, 'sendVerification'])->name('profile.verification.send');
    
    Route::post('user/report', [UserController::class, 'report'])->name('user.report');
    Route::post('event/report', [EventController::class, 'report'])->name('event.report');
});
Route::get('/admin/login', function () {
    return view('admin.layouts.auth');
})->middleware('admin.guest');

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('admin/event', [EventController::class, 'index'])->name('admin.event');
    Route::get('admin/user/verified', [UserController::class, 'verified'])->name('admin.user.verified');
    Route::get('admin/user/block', [UserController::class, 'block'])->name('admin.user.block');
    Route::get('admin/event/block', [EventController::class, 'block'])->name('admin.event.block');
});

Route::get('auth/redirect', [LoginController::class, 'redirectToProvider']);
Route::get('auth/callback', [LoginController::class, 'handleProviderCallback']);

