   <!-- Navigation -->
   <div class="w-full  bg-white py-5 drop-shadow-lg">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <div class="flex">
                <img src="./img/logo.svg" class="mr-3">
                <a href="#" class="font-bold text-prime text-2xl">HeyEvents!</a>
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
            <a href="{{route('home')}}" class="{{request()->is('/') ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Home</a>
            <a href="{{route('event.search')}}" class="{{request()->is('search') ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Cari Event</a>
            <a href="{{route('event.create')}}" class="{{request()->is('create') ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Buat Event</a>
            <a href="{{route('event.joined')}}" class="{{request()->is('joined') ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Tergabung</a>
            <a href="{{route('event.manage')}}" class="{{request()->is('manage') ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Kelola</a>
        </nav>
        <div :class="{'flex': open, 'hidden': !open}"
            class="flex-col hidden md:flex md:justify-end md:flex-row px-4 md:px-0">
            <button class="btn-secondary mb-5 md:mb-0">Masuk</button>
            <button class="btn-primary md:ml-8 ">Daftar</button>
        </div>
    </div>
</div>
<!--End Navigation -->