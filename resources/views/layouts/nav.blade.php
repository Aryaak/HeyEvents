<div class="w-full  bg-white py-5 drop-shadow-lg">
    <div x-data="{ open: false,nav_open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <div class="flex">
                <img src="{{asset('img/logo.svg')}}" class="mr-3">
                <a href="{{route('home')}}" class="font-bold text-prime text-2xl">HeyEvents!</a>
            </div>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="#312B78" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}"
            class="flex-col justify-start  hidden md:flex md:justify-end md:flex-row mt-6 md:mt-0 mb-6 md:mb-0">
            <a href="/" class="{{request()->is('/') ? 'nav-active text-prime font-bold' : 'text-black hover:text-prime' }} px-5 mb-4 md:mb-0">Home</a>
            <a href="{{route('event.search')}}" class="{{request()->is('search') ? 'nav-active text-prime font-bold' : 'text-black hover:text-prime' }} px-5 mb-4 md:mb-0">Cari Event</a>
            <a href="{{route('event.create')}}" class="{{request()->is('create') ? 'nav-active text-prime font-bold' : 'text-black hover:text-prime' }} px-5 mb-4 md:mb-0">Buat Event</a>
            <a href="{{route('event.joined')}}" class="{{request()->is('joined') ? 'nav-active text-prime font-bold' : 'text-black hover:text-prime' }} px-5 mb-4 md:mb-0">Tergabung</a>
            <a href="{{route('event.manage')}}" class="{{request()->is('manage') ? 'nav-active text-prime font-bold' : 'text-black hover:text-prime' }} px-5 mb-4 md:mb-0">Kelola</a>
            <!-- <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="#">Contact</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Dropdown</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #1</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #3</a>
                    </div>
                </div>
            </div> -->
        </nav>
        @guest
        <div :class="{'flex': open, 'hidden': !open}"
            class="flex-col hidden md:flex md:justify-end md:flex-row px-4 md:px-0">
            <a href="{{route('login')}}" class="btn-secondary mb-5 md:mb-0">Masuk</a>
            <a href="{{route('register')}}" class="btn-primary md:ml-8 ">Daftar</a>
        </div>  
        @endguest

        @auth
        <div :class="{'flex': open, 'hidden': !open}"
            class=" hidden  px-5 md:flex md:justify-end md:flex-row md:pl-14 items-center md:border-l-2 border-ghost ">
            <p class="text-black font-semibold text-xl mr-3 order-2 md:order-1">Hey, Jordan!</p>
            <img src="./img/3.jpg" width="44" class="mr-3 order-1 md:order-2">
            <div class="relative order-3 cursor-pointer group br-prime " @click="nav_open = !nav_open">
                <img src="./img/ic_down.svg" width="24" >
                <div :class="{'flex transition ease-in-out duration-500': nav_open, 'hidden': !nav_open}" class="hidden bg-white absolute p-5 -bottom-40 -right-16 shadow-md  flex-col justify-center ">
                    <a href="profile.html" class="mg-5 btn-primary">Profile</a>
                    <a class="mt-5 btn-secondary">Keluar</a>
                </div>
        </div> 
        @endauth
     
    </div>

    </div>
    </div>
</div>