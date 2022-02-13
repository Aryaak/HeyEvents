<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserReport;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();
        return view('admin.pages.user.index', compact('data'));
    }

    public function profile($slug = null, $category=null)
    {
        $user = null;
        $events = [];

        if($slug != null) $user = User::where('slug',$slug)->first();
        if(!$user) $user = User::where('slug', Auth::user()->slug)->first();
        if(!$slug) $slug = Auth::user()->slug;

        switch ($category) {
            case 'event-diikuti':
                $events = isset($user->eventsJoined) ?  $user->eventsJoined->where('user_id', '!=', $user->id) : [];
                break;
            case 'event-dibuat':
                $events = isset($user->events) ?  $user->events : [];
                break;
            case 'disimpan':
                if(Auth::user()->id == $user->id) {
                    $events = isset($user->eventsSaved) ?  $user->eventsSaved : [];
                } else {
                    $category = 'semua';
                }
                break;
            default:
                $category = 'semua';
                foreach($user->eventsJoined as $item){
                    $events[] = $item;
                }

                foreach($user->events as $item){
                    $check = true;
                    foreach($events as $item2){
                        if ($item->id == $item2->id) $check = false;
                    }

                    if($check) $events[] = $item;
                }

                foreach($user->eventsSaved as $item){
                    $check = true;
                    foreach($events as $item2){
                        if ($item->id == $item2->id) $check = false;
                    }

                    if($check) $events[] = $item;
                }
                break;
        }

        return view('pages.profile.index', compact('user', 'events', 'slug', 'category'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'min:4', 'max:20'],
            'bio' => ['required', 'string', 'min:4', 'max:20'],
            'address' => ['required', 'string', 'min:4', 'max:20'],
        ]);

        User::where('id', Auth::user()->id)->update($data);

        return redirect()->back();
    }

    public function report(Request $request)
    {
        $data = $this->validate($request, [
            'user_id' => 'required',
            'reporter_id' => 'required',
            'report' => ['required', 'min:10']
        ]);

        UserReport::create($data);

        return redirect()->back();
    }
    
    public function verification()
    {
        if(Auth::user()->status_id != 3) return redirect()->route('profile');

        $user = Auth::user();
        return view('pages.profile.verification', compact('user'));
    }

    public function sendVerification(Request $request)
    {

        $this->validate($request, [
            'document' => ['mimes:jpeg,jpg,png,gif,pdf', 'required', 'max:10000'],
        ]);

        User::where('id',  Auth::user()->id)->update([
            'status_id' => 2,
            'document' => request()->file('document')->store('documents')
        ]);

        return redirect()->route('profile');
    }
}
