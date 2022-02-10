<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{

    private function checkEventMember($event_id)
    {
        $is_joined = DB::table('event_user')->where('user_id', isset(Auth::user()->id) ? Auth::user()->id : null)->where('event_id', $event_id)->first();
        
        return $is_joined;
    }


    public function discussions($slug)
    {
        $event = Event::where('slug', $slug)->first();
        if(!$this->checkEventMember($event->id)) return redirect()->route('event.show', $event->slug);
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
