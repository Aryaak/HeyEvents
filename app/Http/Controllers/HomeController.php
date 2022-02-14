<?php

namespace App\Http\Controllers;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return view('pages.home.index', compact('data'));
    }
}
