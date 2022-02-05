@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <section class="mx-auto flex md:justify-center gap-x-8 items-center relative">
        <img src="{{asset('storage/'.$user->photo)}}" width="110" >
        <div>
            <h3 class="text-black font-bold md:text-3xl text-2xl">{{$user->name}}</h3>
            <p class="text-grey text-lg mt-2">{{$user->bio ?$user->bio : 'Bio belum di set' }}</p>
            <div class="flex justify-start mt-2">
                <img src="{{asset('img/ic_location.svg')}}" class="mr-3">
                <p>{{$user->address ?$user->address : 'Belum ditentukan' }}</p>
            </div>
            <div class="flex absolute md:mt-3 mt-5 justify-self-center ">
                <a href="{{route('profile.edit')}}" class="btn-secondary mr-3">Edit Profil</a>
                <button class="btn-primary">Ajukan Verifikasi</button>
            </div>
        </div>
    </section>

    <section class="flex items-center gap-x-10 md:mt-20 mt-24 border-b-1 border-grey pb-10 mb-10 text-sm md:text-base">
        <a class="link-secondary">Semua</a>
        <a class="text-grey cursor-pointer">Event Diikuti</a>
        <a class="text-grey cursor-pointer">Event Dibuat</a>
        <a class="text-grey cursor-pointer">Disimpan</a>
    </section>

    <section class="grid md:grid-cols-3 gap-10 justify-items-center align-middle">
         <!-- Card -->
         <div class="card">
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
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">Daring</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">58 Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                    <p class="text-grey ml-3">28 Januari 2022</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
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
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>

            </a>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
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
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">Daring</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">58 Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                    <p class="text-grey ml-3">28 Januari 2022</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
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
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>

            </a>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
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
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">Daring</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">58 Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                    <p class="text-grey ml-3">28 Januari 2022</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
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
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>

            </a>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
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
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">Daring</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">58 Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                    <p class="text-grey ml-3">28 Januari 2022</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
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
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>

            </a>
        </div>
        <!-- End Card -->
    </section>
</main>
@endsection