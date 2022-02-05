<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Event;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function discussions($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('pages.event.discussion', compact('event'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'event_id' => ['required'],
            'user_id' => ['required'],
            'message' => ['required']
        ]);

        Discussion::create($data);

        return redirect()->back();
    }
}
