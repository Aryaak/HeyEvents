   <!-- Navigation -->
   <div class="w-full  bg-white py-5 shadow-lg">
    <div x-data="{ open: false, nav_open:false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <a class="flex"  href="{{route('home')}}">
                <img src="{{asset('img/logo.svg')}}" class="mr-3">
                <span class="font-bold text-prime text-2xl">HeyEvents!</span>
            </a>
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
            <a href="{{route('home')}}" class="{{\Request::route()->getName() == 'home' ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Home</a>
            <a href="{{route('event.search')}}" class="{{\Request::route()->getName() == 'event.search' ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Cari Event</a>
            <a href="{{route('event.create')}}" class="{{\Request::route()->getName() == 'event.create' ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Buat Event</a>
            <a href="{{route('event.joined')}}" class="{{\Request::route()->getName() == 'event.joined' ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Tergabung</a>
            <a href="{{route('event.manage')}}" class="{{\Request::route()->getName() == 'event.manage' ? ' text-prime font-bold nav-active ' : ' text-black hover:text-prime '}}  px-5  mb-4 md:mb-0">Kelola</a>
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
        class=" hidden  px-5 md:flex md:justify-end md:flex-row md:pl-14 items-center md:border-l-2 border-ghost z-50">
            <p class="text-black font-semibold text-xl mr-3 order-2 md:order-1">Hey, {{Auth::user()->name}}!</p>
            <img src="{{asset('storage/' . Auth::user()->photo)}}" width="44" class="mr-3 order-1 md:order-2">
            <div class="relative order-3 cursor-pointer group br-prime " @click="nav_open = !nav_open">
                <img src="{{asset('img/ic_down.svg')}}" width="24" >
                <div :class="{'flex transition ease-in-out duration-500': nav_open, 'hidden': !nav_open}" class="hidden bg-white absolute p-5 -bottom-40 -right-16 shadow-md  flex-col justify-center ">
                    <a href="{{route('profile')}}" class="mg-5 btn-primary">Profile</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="mt-5 btn-secondary">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
        @endauth
     
    </div>
</div>
<!--End Navigation -->