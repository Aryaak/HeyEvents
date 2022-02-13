<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index()
    {
        $data = Event::latest()->get();
        return view('admin.pages.event.index', compact('data'));
    }

    public function search($category = 'semua')
    {
        $query    = new Event();
        if(request('keyword')){
            $query = $query->where(function($query2){
                $query2->where('name', 'LIKE', '%' . request('keyword') . '%')
                ->oRwhere('description', 'LIKE', '%' . request('keyword') . '%')
                ->oRwhereHas('user', function($query3){
                    $query3->where('name', 'LIKE', '%' . request('keyword') . '%');
                });
            });
        }

        switch ($category) {
            case 'onsite':
                $query = $query->where('category_id', 1);
                break;
            case 'online':
                $query = $query->where('category_id', 2);
                break;
            case 'berbayar':
                $query = $query->where('status_id', 1);
                break;
            case 'gratis':
                $query = $query->where('status_id', 2);
                break;
            case 'terverifikasi':
                $query = $query->whereHas('user', function($query){
                    $query->where('status_id', 1);
                });
                break;
            default:
                $category = 'semua';
                break;
        }

        $events = $query->get();
        return view('pages.event.search', compact('events', 'category'));
    }

    public function create()
    {
        return view('pages.event.create');
    }

    public function store(Request $request)
    {
        $validation = [
            'photo' => ['mimes:jpeg,jpg,png,gif,pdf', 'required', 'max:10000'],
            'name' => ['required', 'string', 'min:4', 'max:100'],
            'description' => ['required', 'string', 'min:20'],
            'address' => ['required', 'string', 'min:4', 'max:100'],
            'date' => ['required'],
            'quota' => ['required', 'numeric', 'min:5'],
            'category_id' => ['required'],
            'status_id' => ['required']
        ];
        if ($request->status_id == 1) $validation['price'] =  ['required', 'numeric', 'min:5000'];
        $user =  Auth::user();
        $data = $this->validate($request, $validation);
        $data['user_id'] = $user->id;
        $data['photo'] = $request->file('photo')->store('event');
        $data['slug'] = Str::slug($data['name']);

        if ($data['status_id'] == 2) $data['price'] = 0;

        $event = Event::create($data);

        DB::table('event_user')->insert([
            'event_id' => $event->id,
            'user_id' => $user->id
        ]);

        return redirect()->route('event.show', $event->slug);
    }

    public function joined($category = 'semua')
    {
        $events = [];
        $query = Auth::user()->eventsJoined->where('user_id', '!=', Auth::user()->id);

        switch ($category) {
            case 'akan-berlangsung':
                $events = $query->where('is_ended', false);

                foreach($events as $key => $item){
                    if(Carbon::parse($item->date)->subDays(7) > Carbon::now()){
                        unset($events[$key]);
                    }
                }
                break;
            case 'selesai':
                $events = $query->where('is_ended', true);
                break;
            default:
                $category = 'semua';
                $events = $query;
                break;
        }

        return view('pages.event.joined', compact('events', 'category'));
    }

    public function manage($category = 'semua')
    {
        $events = [];
        $query    = Event::where('user_id', Auth::user()->id)->latest();

        switch ($category) {
            case 'akan-berlangsung':
                $events = $query->where('is_ended', false)->get();

                foreach($events as $key => $item){
                    if(Carbon::parse($item->date)->subDays(7) > Carbon::now()){
                        unset($events[$key]);
                    }
                }
                break;
            case 'selesai':
                $events = $query->where('is_ended', true)->get();
                break;
            default:
                $category = 'semua';
                $events = $query->get();
                break;
        }

        return view('pages.event.manage', compact('events', 'category'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $event['is_joined'] = DB::table('event_user')->where('user_id', isset(Auth::user()->id) ? Auth::user()->id : null)->where('event_id', $event->id)->where('status_id', 1)->first();
        $event['is_pending'] = DB::table('event_user')->where('user_id', isset(Auth::user()->id) ? Auth::user()->id : null)->where('event_id', $event->id)->where('status_id', 2)->first();
        $event['is_saved'] = DB::table('event_saved')->where('user_id', isset(Auth::user()->id) ? Auth::user()->id : null)->where('event_id', $event->id)->first();

        $members = array_slice($event->users->where('id', '!=', $event->user->id)->where('pivot.status_id',  1)->toArray(), 0, 11);
        $pendings = $event->users->where('pivot.status_id', 2);
        return view('pages.event.show', compact('event', 'members', 'pendings'));
    }
    

    public function join()
    {
        $input = request()->all();

        DB::table('event_user')->insert([
            'event_id' => $input['event_id'],
            'user_id' => $input['user_id']
        ]);

        return redirect()->back();
    }

    public function leave()
    {
        $input = request()->all();

        DB::table('event_user')->where('event_id', $input['event_id'])->where('user_id', $input['user_id'])->delete();

        return redirect()->back();
    }

    public function save()
    {
        DB::table('event_saved')->insert(request()->except('_token'));
        return redirect()->back();
    }

    public function unsave()
    {
        $input = request()->all();
        
        DB::table('event_saved')->where('event_id', $input['event_id'])->where('user_id', $input['user_id'])->delete();

        return redirect()->back();
    }

    public function report(Request $request)
    {
        $data = $this->validate($request, [
            'event_id' => 'required',
            'reporter_id' => 'required',
            'report' => ['required', 'min:10']
        ]);

        EventReport::create($data);

        return redirect()->back();
    }

    public function pay(Request $request)
    {
        $input = request()->all();

        $this->validate($request, [
            'document' => ['mimes:jpeg,jpg,png,gif,pdf', 'required', 'max:10000'],
        ]);

        DB::table('event_user')->insert([
            'event_id' => $input['event_id'],
            'user_id' => $input['user_id'],
            'status_id' => 2,
            'document' => request()->file('document') ? request()->file('document')->store('documents') : null
        ]);
        return redirect()->back();
    }

    public function accept()
    {
        $input = request()->all();

        DB::table('event_user')->where([
            'user_id' => $input['user_id'],
            'event_id' => $input['event_id']
        ])->update(['status_id' => 1]);

        return redirect()->back();
    }

    public function reject()
    {
        $input = request()->all();
        
        DB::table('event_user')->where([
            'user_id' => $input['user_id'],
            'event_id' => $input['event_id']
        ])->delete();

        return redirect()->back();
    }
}
