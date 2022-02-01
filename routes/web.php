<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::group(['middleware' => 'auth'], function(){
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search', [EventController::class, 'search'])->name('event.search');
Route::get('create', [EventController::class, 'create'])->name('event.create');
Route::get('joined', [EventController::class, 'joined'])->name('event.joined');
Route::get('manage', [EventController::class, 'manage'])->name('event.manage');

