@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <section class="mx-auto flex md:justify-center gap-x-8 items-center relative">
        <img src="{{asset('storage/'.$user->photo)}}" width="110" >
        <div>
            <div class="flex ">
                <h3 class="text-black font-bold md:text-3xl text-2xl">{{$user->name}}</h3>
                @if ($user->status_id == 1)
                <img src="{{asset('img/check.svg')}}" class="ml-3" width="20">
                @endif
            </div>
            <p class="text-grey text-lg mt-2">{{$user->bio ?$user->bio : 'Bio belum di set' }}</p>
            <div class="flex justify-start mt-2">
                <img src="{{asset('img/ic_location.svg')}}" class="mr-3">
                <p>{{$user->address ?$user->address : 'Belum ditentukan' }}</p>
            </div>
            @if ($user->id == Auth::user()->id )
            <div class="flex absolute md:mt-3 mt-5 justify-self-center ">
                <a href="{{route('profile.edit')}}" class="btn-secondary mr-3">Edit Profil</a>
                @if (Auth::user()->status_id == 3)
                    <button class="btn-primary">Ajukan Verifikasi</button>
                @endif
            </div> 
            @endif
        </div>

        @if ($user->id != Auth::user()->id)
        <div class="group btn-event-action   hidden " id="btn">
            <img src="{{asset('img/info.svg')}} " class="img-event-action">
        </div>
        @endif
        
    </div>

    </section>

    <section class="flex items-center gap-x-10 md:mt-20 mt-24 border-b-1 border-grey pb-10 mb-10 text-sm md:text-base">
        <a href="{{route('profile', $slug)}}" class="{{$category == 'semua' ? 'link-secondary ' : 'text-grey cursor-pointer'}} ">Semua</a>
        <a href="{{route('profile', [$slug, 'event-diikuti'])}}"class="{{$category == 'event-diikuti' ? 'link-secondary ' : 'text-grey cursor-pointer'}} ">Event Diikuti</a>
        <a href="{{route('profile', [$slug, 'event-dibuat'])}}"class="{{$category == 'event-dibuat' ? 'link-secondary ' : 'text-grey cursor-pointer'}} ">Event Dibuat</a>
        @if (Auth::user()->id == $user->id)
        <a href="{{route('profile', [$slug, 'disimpan'])}}"class="{{$category == 'disimpan' ? 'link-secondary ' : 'text-grey cursor-pointer'}} ">Disimpan</a>
        @endif
    </section>

    <section class="grid md:grid-cols-3 gap-10 justify-items-center align-middle">
        @foreach ($events as $item)
        <!-- Card -->
        <div class="card">
            <div class="mb-5">
                <img src="{{asset('storage/' . $item->photo)}}" class="w-full" height="200">
            </div>
            <div class="mb-5 w-full">
                <h4 class="text-prime font-bold text-xl w-full mb-2">{{Str::limit($item->name, 31, $end='...') }}</h4>
                <div class="text-grey max-w-full break-words whitespace-pre-wrap card-text">{{strip_tags(Str::limit($item->description, 100, $end='...')) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-y-5 mb-5">
                <div class="flex items-center">
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">{{$item->category->name}}</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">{{$item->quota}} Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                      @if ($item->is_ended)
                    <p class="text-grey ml-3">Selesai</p>
                    @else
                    <p class="text-grey ml-3">{{ \Carbon\Carbon::parse($item->date)->isoFormat('D MMMM Y')}}</p>
                    @endif
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
                    <p class="text-prime font-semibold ml-3">{{$item->status->name}}</p>
                </div>
            </div>
            <div class="relative">
                 <a href="{{route('profile', $item->user->slug)}}" class="flex items-center">
                    <img src="{{asset('storage/' . $item->user->photo)}}" width="53" height="53">
                    <div class="ml-5">
                        <p class="text-prime font-bold">{{$item->user->name}}</p>
                        <p class="text-grey">{{$item->user->bio ? $item->user->bio : 'Bio belum di set'}}</p>
                    </div>
                </a>
            </div>
            <a href="{{route('event.show', $item->slug)}}" class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>
            </a>
        </div>
        <!-- End Card -->
        @endforeach
    </section>

    {{-- modal --}}
    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-50" id="overlay">
        <div class="bg-white max-w-2xl py-2 px-3  shadow-xl ">
            <div class="p-6  mt-10 ">
                <div class="flex justify-between mb-3">
                    <h3 class="text-lg font-bold  text-black ">
                        Laporkan {{$user->name}}
                    </h3>
                    <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                  <p class="text-base leading-relaxed text-grey ">
                    Kami menangani laporan pengguna dengan serius. Pihak HeyEvents!
                    tidak akan segan menindak pengguna yang melanggar ITE
                  </p>
                <!-- input -->
                <form action="{{route('user.report')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="reporter_id" value="{{Auth::user()->id}}">
                <div class="mt-5 mb-3">
                    <label for="email" class="block mb-2 text-xl text-black font-bold">Mengapa Anda Melaporkan {{$user->name}}?</label>
                    @error('report')
                    <span class="text-red-600 italic text-xs">{{$message}}</span>
                    @enderror
                    <div class="border-1 border-black">
                        <textarea name="report" id="message" rows="9" class="block p-2.5 w-full text-sm text-black bg-white border border-black outline-none "></textarea>
                    </div>
                </div>
                <div class="flex items-center space-x-5 rounded-b border-gray-200  ">
                    <button data-modal-toggle="defaultModal" type="submit" type="button" class="btn-primary">Laporkan</button>
                    <button data-modal-toggle="defaultModal" id="close-btn" type="button" class="btn-secondary">Batal</button>
                </div>
                </form>
               
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
<script>
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const delBtn = document.querySelector('#btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            delBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
        })

    </script>
@endpush