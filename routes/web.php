<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Event\Create;
use App\Http\Livewire\Event\Discussion;
use App\Http\Livewire\Event\Joined;
use App\Http\Livewire\Event\Manage;
use App\Http\Livewire\Event\Search;
use App\Http\Livewire\Event\Show as EventShow;
use App\Http\Livewire\Home;
use App\Http\Livewire\Profile\Edit;
use App\Http\Livewire\Profile\Show as ProfileShow;
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
Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');


Route::get('/', Home::class)->name('home');
Route::get('search', Search::class)->name('event.search');

Route::get('event/{slug}', EventShow::class)->name('event.show');
Route::get('event/discussion/{slug}', Discussion::class)->name('event.discussion');


// Route::group(['middleware' => 'auth'], function(){
    Route::get('profile', ProfileShow::class)->name('profile');
    Route::get('profile/edit/{unique}', Edit::class)->name('profile.edit');

    Route::get('create', Create::class)->name('event.create');
    Route::get('joined', Joined::class)->name('event.joined');
    Route::get('manage', Manage::class)->name('event.manage');
// });