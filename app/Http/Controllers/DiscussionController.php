<?php

namespace App\Http\Controllers;

use App\Events\Discussion as EventsDiscussion;
use App\Models\Discussion;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DiscussionController extends Controller
{

    private function checkEventMember($event_id)
    {
        $is_joined = DB::table('event_user')->where('user_id', isset(Auth::user()->id) ? Auth::user()->id : null)->where('event_id', $event_id)->where('status_id', 1)->first();
        
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
        $user = User::where('id', $request->input('user_id'))->first();
        event(new EventsDiscussion(
        $request->input('event_id'),
        $request->input('user_id'),
        $request->input('message'),
        $user->photo,
        $user->name,
        $user->status_id,
        ));
        Discussion::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
            'message' => $request->input('message')
        ]);
        // $data = $this->validate($request, [
        //     'event_id' => ['required'],
        //     'user_id' => ['required'],
        //     'message' => ['required']
        // ]);

        // Discussion::create($data);

        // return redirect()->back();
    }
}
