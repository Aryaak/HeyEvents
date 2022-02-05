@section('title', 'Buat Event')

@extends('layouts.app')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <div class="flex justify-start gap-x-1  md:gap-x-3 items-center relative  text-sm md:text-base ml-20">
        <span class="text-grey">Cari Event</span>
        <span class="text-grey font-semibold mt-1">
            <img src="{{asset('img/ic_right2.svg')}}">
        </span>
        <span class="text-prime font-semibold">{{$event->name}}</span>
    </div>

    <div class="flex justify-center mt-12 items-center">
        <div>
            <img src="{{asset('storage/' . $event->user->photo)}}" width="53" height="53">
        </div>
        <div class="text-start px-4 flex flex-col justify-center">
            <div class="flex mb-3">
                <p class="font-semibold text-prime mr-3">{{$event->user->name}}</p>
                <img src="{{asset('img/check.svg')}}" >
            </div>
            <p class="text-grey">{{$event->user->bio ? $event->user->bio : 'Bio belum di set'}}</p>
        </div>
        <div class="ml-36">
            @auth
                @if ($event->user_id == Auth::user()->id)
                <button class="btn-primary md:ml-8">Ubah</button>
                @else
                @if ($event->is_joined)
                <form action="{{route('event.leave')}}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn-secondary md:ml-8">Keluar</button>
                 </form>
                @else
                <form action="{{route('event.join')}}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn-primary md:ml-8">Gabung</button>
                 </form>
                @endif
              
                @endif 
            @endauth
            @guest
            <form action="{{route('event.join')}}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="user_id" value="{{null}}">
                <button type="submit" class="btn-primary md:ml-8">Gabung</button>
            </form>
            @endguest

        </div>
    </div>

    <div class="fixed md:left-32 left-5 md:top-72 top-96 flex flex-col justify-center items-center">
        <a href="{{route('event.discussion', $event->slug)}}" class="border-2 border-prime md:p-3 p-1 mb-3">
            <img src="{{asset('img/icon-1.png')}}" >
        </a>
        <div class="border-2 border-prime md:p-3 p-1 mb-3">
            <img src="{{asset('img/icon-2.png')}}" >
        </div>
        <div class="border-2 border-prime md:p-3 p-1 mb-3">
            <img src="{{asset('img/icon-3.png')}}" >
        </div>
    </div>

    <div class="mt-12 mx-auto w-6/12">
        <h1 class="font-bold text-3xl">{{$event->name}}</h1>

        <img src="{{asset('storage/' . $event->photo)}}" width="786" height="481" class="mt-16 mx-auto blok">
        <div class="flex justify-center my-12">
            <div class="text-grey w-10/12 text-justify ">
                {!!$event->description!!}
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-2 gap-y-5 mb-5 ml-10 my-12">
            <div class="flex items-start">
                <img src="{{asset('img/Location.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Onsite</p>
                    <p class="text-prime font-semibold">{{$event->address}}</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/3 User.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Peserta</p>
                    <p class="text-prime font-semibold">{{$event->quota}} Peserta</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/Calendar.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Jadwal</p>
                    <p class="text-prime font-semibold">{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMMM Y')}}</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/Ticket.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Akses</p>
                    <p class="text-prime font-semibold">{{$event->status_id == 1 ? 'Rp. ' . number_format($event->price,0,"",".").',-' : $event->status->name}}</p>
                </div>
            </div>
        </div>

        @if ($event->category_id == 1)
        <div class="flex justify-center my-12">
            <img src="{{asset('img/poster.png')}}" alt="">
        </div>
        @endif
      
        <hr>
    
        <div class="my-10">
            <h1 class="text-dark font-semibold">Partisipan bergabung</h1>
        </div>
        <div class="grid md:grid-cols-6 grid-cols-3 gap-5 md:mt-12 mt-3 justify-items-center items-center ">
            @foreach ($members as $item)
            <img src="{{asset('storage/' . $item['photo'])}}" width="100" height="100">
            @endforeach
            @if (count( $event->users) > 11)
            <div class="border-1 w-full h-24 border-prime flex justify-center items-center">
                <h2 class="text-center font-bold text-prime text-2xl ">+{{count($event->users) - 11}}</h2>
            </div> 
            @endif
            
        </div>
    </div>
</main>
@endsection
