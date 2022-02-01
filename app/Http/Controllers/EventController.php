<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function search()
    {
        return view('pages.event.search');
    }

    public function create()
    {
        return view('pages.event.create');
    }

    public function joined()
    {
        return view('pages.event.joined');
    }

    public function manage()
    {
        
        return view('pages.event.manage');
    }
}
