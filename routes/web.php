<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('create', [EventController::class, 'create'])->name('event.create');
    Route::post('event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('joined/{category?}', [EventController::class, 'joined'])->name('event.joined');
    Route::get('manage/{category?}', [EventController::class, 'manage'])->name('event.manage');
    Route::post('event/join', [EventController::class, 'join'])->name('event.join');
    Route::post('event/leave', [EventController::class, 'leave'])->name('event.leave');

    Route::get('discussion/{slug}', [DiscussionController::class, 'discussions'])->name('event.discussion');
    Route::post('discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [UserController::class, 'update'])->name('profile.update');

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search/{category?}/{keyword?}', [EventController::class, 'search'])->name('event.search');
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');
