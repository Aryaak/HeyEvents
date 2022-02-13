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
        <a href="{{route('profile', $event->user->slug)}}" class="flex justify-center  items-center">
            <div>
                <img src="{{asset('storage/' . $event->user->photo)}}" width="53" height="53">
            </div>
            <div class="text-start px-4 flex flex-col justify-center">
                <div class="flex mb-3">
                    <p class="font-semibold text-prime mr-3">{{$event->user->name}}</p>
                    @if ($event->user->status_id == 1)
                        <img src="{{asset('img/check.svg')}}" >
                    @endif
                </div>
                <p class="text-grey">{{$event->user->bio ? $event->user->bio : 'Bio belum di set'}}</p>
            </div>
        </a>
       
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
                {{-- <form action="{{route('event.join')}}" method="POST"> --}}
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn-primary md:ml-8" id="btn1">Gabung</button>
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

    @auth
    <div class="fixed md:left-32 left-5 md:top-72 top-96 flex flex-col justify-center items-center">
        @if ($event->is_joined)
        <a href="{{route('event.discussion', $event->slug)}}" class="group btn-event-action mb-3">
            <img class="img-event-action" src="{{asset('img/icon-1.svg')}}" >
        </a>
        @endif
        @if ($event->user_id != Auth::user()->id)
            <button id="btn" class="group btn-event-action mb-3">
                <img class="img-event-action" src="{{asset('img/icon-2.svg')}}" >
            </button>
        @endif
        @if (Auth::user()->id != $event->user->id)
            @if ($event['is_saved'])
            <form action="{{route('event.unsave')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <button type="submit" class="group btn-event-action-active mb-3">
                    <img class="img-event-action-active" src="{{asset('img/icon-3.svg')}}" >
                </button>
            </form>
            @else
                <form action="{{route('event.save')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <button type="submit" class="group btn-event-action mb-3">
                        <img class="img-event-action" src="{{asset('img/icon-3.svg')}}" >
                    </button>
                </form>
            @endif
        @endif
    </div>
    @endauth
    

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
                    <p class="text-grey ">{{$event->category->name}}</p>
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
            <h1 class="text-dark font-semibold mb-10">Partisipan bergabung</h1>
            @empty($members)
            <span>Belum ada partisipan yang bergabung</span>
            @endempty
        </div>
        <div class="grid md:grid-cols-6 grid-cols-3 gap-5 md:mt-12 mt-3 justify-items-center items-center ">
            @foreach ($members as $item)
            <a href="{{route('profile', $item['slug'])}}">
                <img src="{{asset('storage/' . $item['photo'])}}" width="100" height="100">
            </a>
            @endforeach
            @if (count( $event->users) > 11)
            <div class="border-1 w-full h-24 border-prime flex justify-center items-center">
                <h2 class="text-center font-bold text-prime text-2xl ">+{{count($event->users) - 11}}</h2>
            </div> 
            @endif
        </div>
    </div>
</main>

 {{-- modal --}}
 @auth
 <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-50" id="overlay">
    <div class="bg-white max-w-2xl py-2 px-3  shadow-xl ">
        <div class="p-6  mt-10 ">
            <div class="flex justify-between mb-3">
                <h3 class="text-lg font-bold  text-black ">
                    Laporkan {{$event->name}}
                </h3>
            </div>
              <p class="text-base leading-relaxed text-grey ">
                Kami menangani laporan event dengan serius. Pihak HeyEvents!
                tidak akan segan menindak pengguna yang melanggar ITE
              </p>
            <!-- input -->
            <form action="{{route('event.report')}}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input type="hidden" name="reporter_id" value="{{Auth::user()->id}}">
            <div class="mt-5 mb-3">
                <label for="email" class="block mb-2 text-xl text-black font-bold">Mengapa Anda Melaporkan {{$event->name}}?</label>
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

{{-- modal1  --}}
<div class="hidden bg-black bg-opacity-50 fixed inset-0 justify-center items-center" id="overlay1">
    <div class="bg-white max-w-screen-lg py-2 px-3 rounded shadow-xl text-gray-800 flex">
        <div class="card m-10 md:flex md:flex-col hidden">
            <div class="mb-5">
                <img src="./img/1.jpg" class="w-full">
            </div>
            <div class="mb-5 w-full">
                <h4 class="text-prime font-bold text-xl w-full mb-2">Rapat Terbuka HIMA Unair</h4>
                <p class="text-grey w-full">Rapat rutin tahunan dari berbagai himpunan mahasiswa Unair yang
                    dilakukan secara terb...</p>
            </div>
            <div class="grid grid-cols-2 gap-y-5 mb-5">
                <div class="flex items-center">
                    <img src="./img/ic_location.svg">
                    <p class="text-grey ml-3">Daring</p>
                </div>
                <div class="flex items-center">
                    <img src="./img/ic_people.svg">
                    <p class="text-grey ml-3">58 Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="./img/ic_calendar.svg">
                    <p class="text-grey ml-3">28 Januari 2022</p>
                </div>
                <div class="flex items-center">
                    <img src="./img/ic_ticket.svg">
                    <p class="text-prime font-semibold ml-3">Gratis</p>
                </div>
            </div>
            <div>
                <div class="flex items-center">
                    <img src="./img/2.jpg" width="53" height="53">
                    <div class="ml-5">
                        <p class="text-prime font-bold">Haruna</p>
                        <p class="text-grey">Mahasiswa</p>
                    </div>
                </div>
            </div>
            <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>
            </a>
        </div>

        <div class="border-1 border-gray-300 hidden md:flex"></div>


        <div class="md:mx-10 mx-2 flex flex-col md:w-6/12 w-fulls">
            <div class="flex gap-x-5 mt-10">
                <div class="mt-1">
                    <img src="img/Ticket.svg" alt="">
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-prime">Harga Akses</h1>
                    <p class="text-gray-700">IDR 210.000,-</p>
                </div>
            </div>

            <div class="mt-16">
                <h1 class="text-2xl font-bold text-prime">Pilih Metode Pembayaran</h1>
                <div class="mt-6">
                    <img src="{{asset('img/BNI.svg')}} " alt="">
                    <div class="flex gap-x-5 mt-2">
                        <p>0123456789</p>
                        <p class="text-gray-400 text-sm">copy</p>
                    </div>
                </div>
                <div class="mt-6">
                    <img src="{{asset('img/BCA.svg')}} " alt="">
                    <div class="flex gap-x-5 mt-2">
                        <p>0987654321</p>
                        <p class="text-gray-400 text-sm">copy</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-x-5 items-center space-x-2 rounded-b border-gray-200 my-14">
                <button data-modal-toggle="defaultModal"
                    class="btn-secondary" id="modal2">Bayar Dengan Midtrans</button>
                <div class="close-btn1">
                    <button data-modal-toggle="defaultModal" class="btn-primary" id="btn2">Upload Bukti</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- modal2 -->
    <div class="hidden bg-black bg-opacity-50 absolute inset-0 justify-center items-center" id="overlay2">
        <div class="bg-white max-w-screen-lg py-2 px-3 rounded shadow-xl text-gray-800 flex flex-col md:flex-row">
            <div class="card md:m-10 m-0 md:w-1/2 w-11/12 md:flex md:flex-col hidden">
                <div class="mb-5">
                    <img src="./img/1.jpg" class="w-full">
                </div>
                <div class="mb-5 w-full">
                    <h4 class="text-prime font-bold text-xl w-full mb-2">Rapat Terbuka HIMA Unair</h4>
                    <p class="text-grey w-full">Rapat rutin tahunan dari berbagai himpunan mahasiswa Unair yang
                        dilakukan secara terb...</p>
                </div>
                <div class="grid grid-cols-2 gap-y-5 mb-5">
                    <div class="flex items-center">
                        <img src="./img/ic_location.svg">
                        <p class="text-grey ml-3">Daring</p>
                    </div>
                    <div class="flex items-center">
                        <img src="./img/ic_people.svg">
                        <p class="text-grey ml-3">58 Peserta</p>
                    </div>
                    <div class="flex items-center">
                        <img src="./img/ic_calendar.svg">
                        <p class="text-grey ml-3">28 Januari 2022</p>
                    </div>
                    <div class="flex items-center">
                        <img src="./img/ic_ticket.svg">
                        <p class="text-prime font-semibold ml-3">Gratis</p>
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                        <img src="./img/2.jpg" width="53" height="53">
                        <div class="ml-5">
                            <p class="text-prime font-bold">Haruna</p>
                            <p class="text-grey">Mahasiswa</p>
                        </div>
                    </div>
                </div>
                <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                    <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                        width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                            fill="white" />
                    </svg>
                </a>
            </div>

            <div class="border-1 border-gray-300 hidden md:flex"></div>

            <div class="md:mx-10 mx-2 flex flex-col md:w-6/12 w-fulls">
                <div class="flex gap-x-5 mt-10">
                    <div class="mt-1">
                        <img src="img/Ticket.svg" alt="">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-prime">Harga Akses</h1>
                        <p class="text-gray-700">IDR 210.000,-</p>
                    </div>
                </div>

                <div class="mt-16">
                    <h1 class="text-2xl font-bold text-prime">Pilih Metode Pembayaran</h1>
                    <div class="mt-6">
                        <img src="{{asset('img/BNI.svg')}} " alt="">
                        <img src="{{asset('img/logo.svg')}}" alt="">
                        <div class="flex gap-x-5 mt-2">
                            <p>0123456789</p>
                            <p class="text-gray-400 text-sm">copy</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <img src="{{asset('img/BCA.svg')}} " alt="">
                        <div class="flex gap-x-5 mt-2">
                            <p>0987654321</p>
                            <p class="text-gray-400 text-sm">copy</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center space-x-2 rounded-b border-gray-200 mt-40">
                    <button data-modal-toggle="defaultModal"
                        class="btn-primary" id="btn3">Upload Bukti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal3 -->
    <div class="hidden bg-black bg-opacity-50 absolute inset-0 justify-center items-center" id="overlay3">
        <div class="bg-white max-w-screen-xl py-2 px-3 rounded shadow-xl text-gray-800 flex w-8/12">
            <div class="py-10 w-full mx-auto px-4 md:px-6">
                <div id="step1">
                    <div class="flex justify-between">
                        <a href="index.html" class="btn-secondary">Kembali</a>
                        <button onclick="next()" class="btn-primary" id="btn4">Upload</button>
                    </div>
        
                    <div id="drop_zone" class="border-1 border-prime mt-10 border-dashed py-14 relative md:w-8/12 mx-auto">
                        <div id="btn_file_pick"
                            class="  absolute top-0 bottom-0 left-0 right-0 flex justify-center items-center p-3">
                            <img src="" id="gambar" style="height: 100%; ">
                        </div>
                        <div id="upload_info" class="flex justify-center items-center flex-col">
                            <img src="{{asset('img/ic_image.svg')}} ">
                            <p class="text-prime mt-10 ml-3 md:ml-0">Drag and drop bukti pembayaran di kotak ini. Atau <span
                                    class="font-bold">upload</span></p>
                            <p class="text-grey mt-3 ml-3 md:ml-0">*file harus dalam format jpg, jpeg, png</p>
                            <input type="file" id="selectfile" class="opacity-0">
                            <p id="message_info"></p>
                        </div>
        
                    </div>
        
                    <div class="image">
                    </div>
        
                </div>
        
                <section id="step2" class="hidden">
                    <div class="flex justify-between">
                        <button onclick="back()" class="btn-secondary">Kembali</button>
                        <button class="btn-primary">Buat</button>
                    </div>
        
                    <div class=" mt-20 text-center">
                        <h3 class="text-black font-bold text-3xl">Detail Event</h3>
                    </div>
        
                    <form action="" class="mt-10 md:w-5/12 mx-auto">
        
                        <div class="flex flex-col mb-5">
                            <label for="title" class="text-prime font-semibold text-xl">Nama Event</label>
                            <input type="text" name="title" id="title" class="form-control mt-2"
                                placeholder="Judul utama eventmu">
                        </div>
        
                        <div class="flex flex-col mb-5">
                            <label for="description" class="text-prime font-semibold text-xl mb-2">Deskripsi</label>
                            <textarea id="description" class="form-control " name="description" id="description" cols="30"
                                rows="10"></textarea>
                        </div>
        
                        <div class="flex flex-col mb-5">
                            <label for="description" class="text-prime font-semibold text-xl">Pengadaan</label>
                            <div class="mt-2 flex">
                                <div class="flex items-center mr-4 mb-4">
                                    <input name="procurement" id="onsite" type="radio" class="hidden" checked />
                                    <label for="onsite" class="flex items-center cursor-pointer text-lg text-grey">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                        Onsite</label>
                                </div>
                                <div class="flex items-center mr-4 mb-4">
                                    <input name="procurement" id="online" type="radio" class="hidden" />
                                    <label for="online" class="flex items-center cursor-pointer text-lg text-grey">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                        Online</label>
                                </div>
                            </div>
                            <input type="text" name="info" id="info" class="form-control mt-2"
                                placeholder="Lokasi event atau link video conference">
                        </div>
        
                        <div class="flex flex-col mb-5  relative">
                            <label for="date" class="text-prime font-semibold text-xl">Jadwal</label>
                            <div class="form-control relative mt-2">
                                <input autofocus="true" type="date" name="date" id="date" class="w-full outline-none">
                            </div>
                        </div>
        
                        <div class="flex flex-col mb-5  relative">
                            <label for="quota" class="text-prime font-semibold text-xl">Jumlah Peserta</label>
                            <div class="form-control relative mt-2">
                                <p class="text-prime absolute right-0 bg-white pr-4">Peserta</p>
                                <input autofocus="true" type="number" name="quota" id="quota" min="0"
                                    class="w-full outline-none" value="0">
                            </div>
                        </div>
        
                        <div class="flex flex-col mb-5">
                            <label for="description" class="text-prime font-semibold text-xl">Akses</label>
                            <div class="mt-2 flex">
                                <div class="flex items-center mr-4 mb-4">
                                    <input onchange="changeAccess()" name="access" id="paid" type="radio" class="hidden"
                                        checked />
                                    <label for="paid" class="flex items-center cursor-pointer text-lg text-grey">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                        Berbayar</label>
                                </div>
                                <div class="flex items-center mr-4 mb-4">
                                    <input onchange="changeAccess()" name="access" id="free" type="radio" class="hidden" />
                                    <label for="free" class="flex items-center cursor-pointer text-lg text-grey">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                        Gratis</label>
                                </div>
                            </div>
                            <input type="number" name="price" id="price" class="form-control mt-2" placeholder="Harga tiket"
                                min="0">
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- modal4 -->
    <div class="hidden bg-black bg-opacity-50 fixed inset-0 justify-center items-center z-50" id="overlay4">
        <div class="bg-white py-2 px-3 rounded shadow-xl text-gray-800 flex w-9/12">
            <div class="py-10 w-full mx-auto px-4 md:px-6">
                <div class="flex justify-center">
                    <img src="{{asset('img/modal.svg')}} " alt="">
                </div>
                <div class="text-center mt-10">
                    <h1 class="text-xl text-prime text-center font-bold">Terima Kasih</h1>
                    <p class="text-black">Pembayaran anda telah diterima dan sedang diverifikasi</p>
                </div>
                <div class="flex justify-center mt-10">
                    <button data-modal-toggle="defaultModal"
                        class="btn-primary" id="close-btn4">Kembali</button>
                </div>
            </div>
        </div>
    </div>

 @endauth
 
@endsection

@push('js')
<script>
    // modal report 
const overlay = document.querySelector('#overlay')
const delBtn = document.querySelector('#btn')
const closeBtn = document.querySelector('#close-btn')

const toggleModal = () => {
    overlay.classList.toggle('hidden')
    overlay.classList.toggle('flex')
}

delBtn.addEventListener('click', toggleModal)
closeBtn.addEventListener('click', toggleModal)


// modal1
window.addEventListener('DOMContentLoaded', () =>{
            const overlay1 = document.querySelector('#overlay1')
            const delBtn1 = document.querySelector('#btn1')
            const Closebtn2 = document.querySelector('#btn2')


            const toggleModal = () => {
                overlay1.classList.toggle('hidden')
                overlay1.classList.toggle('flex')
            }

            delBtn1.addEventListener('click', toggleModal)

            Closebtn2.addEventListener('click', toggleModal)
        })
// modal2
window.addEventListener('DOMContentLoaded', () =>{
            const overlay2 = document.querySelector('#overlay2')
            const delBtn2 = document.querySelector('#btn2')
            const closeBtn2 = document.querySelector('#btn3')

            const toggleModal = () => {
                overlay2.classList.toggle('hidden')
                overlay2.classList.toggle('flex')
            }

            delBtn2.addEventListener('click', toggleModal)

            closeBtn2.addEventListener('click', toggleModal)
})
// modal3
window.addEventListener('DOMContentLoaded', () =>{
            const overlay3 = document.querySelector('#overlay3')
            const delBtn3 = document.querySelector('#btn3')
            const closeBtn3 = document.querySelector('#btn4')

            const toggleModal = () => {
                overlay3.classList.toggle('hidden')
                overlay3.classList.toggle('flex')
            }

            delBtn3.addEventListener('click', toggleModal)

            closeBtn3.addEventListener('click', toggleModal)
        })
// modal4
window.addEventListener('DOMContentLoaded', () =>{
            const overlay4 = document.querySelector('#overlay4')
            const delBtn4 = document.querySelector('#btn4')
            const closeBtn4 = document.querySelector('#close-btn4')

            const toggleModal = () => {
                overlay4.classList.toggle('hidden')
                overlay4.classList.toggle('flex')
            }

            delBtn4.addEventListener('click', toggleModal)

            closeBtn4.addEventListener('click', toggleModal)
        })
</script>
@endpush
