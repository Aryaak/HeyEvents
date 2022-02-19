<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventReport;
use App\Models\User;
use App\Models\UserReport;

class DashboardController extends Controller
{
    public function index()
    {
        $count['events'] = Event::count();
        $count['users'] = User::count();
        $count['reports'] = UserReport::count() + EventReport::count();
        $count['done'] = Event::where('is_ended', true)->count();
        $count['verified'] = User::where('status_id', 1)->count();
        $events = Event::where('is_ended', false)->orderBy('date', 'ASC')->get();
        $users = User::latest()->limit(10)->get();
        return view('admin.pages.dashboard.index', compact('count', 'events', 'users'));
    }
}
