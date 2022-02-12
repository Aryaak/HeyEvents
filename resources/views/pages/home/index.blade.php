@section('title', 'Home')

@extends('layouts.app')

@section('content')
<main>
    <section
        class="relative content flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5"
        id="home">
        <div class="flex md:mx-8 mx-auto mt-14">
            <!-- Content -->
            <div class="mr-20 ">
                <div class="md:ml-0 ml-10">
                    <p class="text-base text-green pb-6 font-semibold">MOMEN SEKALI SEUMUR HIDUP</p>
                    <h2 class="md:text-3xl text-lg pb-6 font-bold leading-loose">
                        Cari dan Kelola <a class="text-prime">Event</a> <br> Dalam <a class="text-prime">Satu
                            Platform.</a>
                    </h2>
                    <p class="text-grey mb-6">
                        Rayakan era
                        <a class="text-prime">#newnormal</a>
                        dengan event dan <br> ciptakan momen berharga dalam hidup
                    </p>
                </div>
                <div class="flex flex-1 gap-6 justify-center">
                    <button class="btn-primary h-2/5">Cari Events</button>
                    <button class="btn mb-5 md:mb-0 bg-white hover:bg-prime hover:text-white ">Buat Events</button>
                </div>
            </div>
            <!-- Image -->
            <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10 ml-10">
                <img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full" src="img/hero.png" alt="" />
            </div>
        </div>
    </section>

    <!-- logo -->
    <div
        class="relative content flex md:flex-row md:flex-rows max-w-screen-xl px-4 mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5 mt-12">
        <img src="img/apple.png" alt="" class="md:w-1/12 md:h-1/12 w-14 md:mx-6 mx-0">
        <img src="img/adobe.png" alt="" class="md:w-1/12 md:h-1/12 w-14 md:mx-6 mx-2">
        <img src="img/slack.png" alt="" class="md:w-1/12 md:h-1/12 w-14 md:mx-6 mx-2">
        <img src="img/spotify.png" alt="" class="md:w-1/12 md:h-1/12 w-14 md:mx-6 mx-2">
        <img src="img/google.png" alt="" class="md:w-1/12 md:h-1/12 w-14 md:mx-6 mx-2">
    </div>

    <!-- content -->
    <div
        class="relative content flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-start md:flex-row md:px-8 lg:px-8 py-5 mt-12 pl-4">
        <div class="md:ml-20 ml-0">
            <img src="img/kotak.png" alt="">
        </div>
        <div>
            <h1 class="font-semibold md:text-3xl text-lg ml-36">Cari dan <br> Gabung <br> Event <br> Disekitar</h1>
        </div>
        <div class="ml-20">
            <img src="img/content1.png" alt="">
        </div>
    </div>

    <!-- content2 -->
    <div
        class="relative content flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-end md:flex-row md:px-8 lg:px-8 py-5 mt-16">
        <div class="ml-80">
            <img src="img/content2.png" alt="">
        </div>
        <div class="ml-16">
            <p class="text-grey w-2/4 mb-5">Bertemu dengan berbagai teman baru. Berbagi ide, menambah relasi, dan
                ciptakan momen bersama</p>
            <button class="btn-secondary">Gabung Events Sekarang</button>
        </div>
        <div class="mr-20">
            <img src="img/kotak2.png" alt="">
        </div>
    </div>

    <!-- content3 -->
    <div
        class="relative content flex flex-row max-w-screen-xl px-4 mx-auto md:items-center md:justify-center md:px-8 lg:px-8 py-5 mt-16 w-32 md:w-full justify-center">
        <img src="img/content3-1.png">
        <img src="img/content3-2.png">
        <img src="img/content3-3.png">
    </div>
    <div
        class="relative content flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5 mt-16">
        <div class="md:ml-20 ml-0">
            <h1 class="font-bold md:text-4xl text-lg leading-relaxed">Pengelola Event? Atau, Ingin Mengadakan Event?
                Sans.</h1>
        </div>
        <div class="mr-10">
            <p class="mb-10 md:mt-0 mt-3 text-xs md:text-lg leading-relaxed text-grey">Menginisiasi dan mengadakan
                event dengan mudah
                dan tidak terbatas pada skala perorangan, organisasi,
                bahkan korporat.</p>
            <div class="flex justify-center">
                <button class="btn-secondary">Gabung Events Sekarang</button>
            </div>
        </div>
    </div>

    <div class="bg-prime">
        <div
            class="flex flex-col max-w-screen-xl mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5 mt-16">
            <div class="text-white">
                <h1 class="font-bold text-3xl w-3/5 mb-5">Beberapa Event Akan Berlangsung</h1>
                <p class="w-2/5 mb-7">Berikut adalah beberapa event yang akan
                    diadakan oleh komunitas HeyEvents!</p>
                <button class="btn bg-green text-white">Cari Lebih Lanjut</button>
            </div>

            <div class="variable slider p-4">
                <!-- Card -->
                <div class="mx-4">
                    <div class="card border-none">

                        <div class="mb-5">
                            <img src="./img/smkn1-head.png" class="w-full">
                        </div>
                        <div class="mb-5 w-full">
                            <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4>
                            <p class="text-grey text-base w-full">SMK Coding Surabaya merupakan pelatihan siswa
                                jurusan
                                RPL
                                yang diselenggarakan seti...</p>
                        </div>
                        <div class="grid grid-cols-2 gap-y-5 mb-5">
                            <div class="flex items-center">
                                <img src="./img/Location.png">
                                <p class="text-grey ml-3">Onsite</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/3 User.png">
                                <p class="text-grey ml-3">58 Peserta</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Calendar.png">
                                <p class="text-grey ml-3">28 Januari 2022</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Ticket.png">
                                <p class="text-prime font-semibold ml-3">Gratis</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" alt="">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden bg-prime p-4">
                            <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                                width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                    <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                        <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                            width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
                <div class="mx-4">
                    <div class="card border-none">

                        <div class="mb-5">
                            <img src="./img/smkn1-head.png" class="w-full">
                        </div>
                        <div class="mb-5 w-full">
                            <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4>
                            <p class="text-grey text-base w-full">SMK Coding Surabaya merupakan pelatihan siswa
                                jurusan
                                RPL
                                yang diselenggarakan seti...</p>
                        </div>
                        <div class="grid grid-cols-2 gap-y-5 mb-5">
                            <div class="flex items-center">
                                <img src="./img/Location.png">
                                <p class="text-grey ml-3">Onsite</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/3 User.png">
                                <p class="text-grey ml-3">58 Peserta</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Calendar.png">
                                <p class="text-grey ml-3">28 Januari 2022</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Ticket.png">
                                <p class="text-prime font-semibold ml-3">Gratis</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" alt="">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden bg-prime p-4">
                            <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                                width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                    <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                        <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                            width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
                <div class="mx-4">
                    <div class="card border-none">

                        <div class="mb-5">
                            <img src="./img/smkn1-head.png" class="w-full">
                        </div>
                        <div class="mb-5 w-full">
                            <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4>
                            <p class="text-grey text-base w-full">SMK Coding Surabaya merupakan pelatihan siswa
                                jurusan
                                RPL
                                yang diselenggarakan seti...</p>
                        </div>
                        <div class="grid grid-cols-2 gap-y-5 mb-5">
                            <div class="flex items-center">
                                <img src="./img/Location.png">
                                <p class="text-grey ml-3">Onsite</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/3 User.png">
                                <p class="text-grey ml-3">58 Peserta</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Calendar.png">
                                <p class="text-grey ml-3">28 Januari 2022</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Ticket.png">
                                <p class="text-prime font-semibold ml-3">Gratis</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" alt="">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden bg-prime p-4">
                            <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                                width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                    <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                        <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                            width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
                <div class="mx-4">
                    <div class="card border-none">

                        <div class="mb-5">
                            <img src="./img/smkn1-head.png" class="w-full">
                        </div>
                        <div class="mb-5 w-full">
                            <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4>
                            <p class="text-grey text-base w-full">SMK Coding Surabaya merupakan pelatihan siswa
                                jurusan
                                RPL
                                yang diselenggarakan seti...</p>
                        </div>
                        <div class="grid grid-cols-2 gap-y-5 mb-5">
                            <div class="flex items-center">
                                <img src="./img/Location.png">
                                <p class="text-grey ml-3">Onsite</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/3 User.png">
                                <p class="text-grey ml-3">58 Peserta</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Calendar.png">
                                <p class="text-grey ml-3">28 Januari 2022</p>
                            </div>
                            <div class="flex items-center">
                                <img src="./img/Ticket.png">
                                <p class="text-prime font-semibold ml-3">Gratis</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" class="ml-3">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden bg-prime p-4">
                            <svg class="group-active:relative group-active:-right-4 transition duration-1000 ease-in-out"
                                width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                    <a class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                        <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                            width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- card -->
    <div
        class="max-w-screen-xl mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5 mt-16 text-center">
        <div class="items-center Absolut inset-x-0">
            <h1 class="font-bold text-3xl text-prime text-center justify-center items-center">Tunggu Apalagi?
                Jadilah Bagian Dari <br>
                HeyEvents! Sekarang</h1>
        </div>
        <!-- card -->
        <div class="flex md:flex-row flex-col justify-center">
            <div>
                <div class="mx-4 mt-16">
                    <div class="card">

                        <div class="mb-5">
                            <!-- <img src="./img/smkn1-head.png" class="w-full"> -->
                            <img src="./img/rate.svg" alt="">
                        </div>
                        <div class="mb-5 w-full">
                            <!-- <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4> -->
                            <p class="text-grey text-base md:w-full w-72">Webnya keren bangett. Belum ada konsep
                                aplikasi
                                seperti ini di Indonesia, platform untuk cari info info event yang ada. Sangat
                                membantu buat orang kayak aku yang sukaa banget nge-event 😆</p>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" class="w-1/4 h-1/4">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mx-4 mt-16">
                    <div class="card">

                        <div class="mb-5">
                            <!-- <img src="./img/smkn1-head.png" class="w-full"> -->
                            <img src="./img/rate.svg" alt="">
                        </div>
                        <div class="mb-5 w-full">
                            <!-- <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4> -->
                            <p class="text-grey text-base w-full">Webnya keren bangett. Belum ada konsep aplikasi
                                seperti ini di Indonesia, platform untuk cari info info event yang ada. Sangat
                                membantu buat orang kayak aku yang sukaa banget nge-event 😆</p>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" class="w-1/4 h-1/4">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mx-4 mt-16">
                    <div class="card">

                        <div class="mb-5">
                            <!-- <img src="./img/smkn1-head.png" class="w-full"> -->
                            <img src="./img/rate.svg" alt="">
                        </div>
                        <div class="mb-5 w-full">
                            <!-- <h4 class="text-prime font-bold text-xl w-full mb-2">SMK Coding Surabaya 2022</h4> -->
                            <p class="text-grey text-base w-full">Webnya keren bangett. Belum ada konsep aplikasi
                                seperti ini di Indonesia, platform untuk cari info info event yang ada. Sangat
                                membantu buat orang kayak aku yang sukaa banget nge-event 😆</p>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="flex items-center">
                                    <img src="./img/smkn1.png" width="53" height="53">
                                    <div class="ml-5">
                                        <div class="flex">
                                            <p class="text-prime font-bold">SMKN 1 Surabaya</p>
                                            <img src="{{asset('img/check.svg')}}" class="w-1/4 h-1/4">
                                        </div>
                                        <p class="text-grey">Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <button class="btn-secondary mt-12 ">Gabung Events Sekarang</button>
        </div>
    </div>

  
</main>
@endsection