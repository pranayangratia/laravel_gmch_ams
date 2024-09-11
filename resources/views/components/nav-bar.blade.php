<nav class="sticky top-0 z-10 flex w-full justify-around bg-blue">
    <div class="flex w-full max-w-screen-2xl justify-between">

        <div class="m-2 flex">
            <div class="flex items-center">
                <h1 class="text-2xl text-white font-Italiana">GMCH</h1>
            </div>
            <div class="flex items-center">
                <form method="GET" action="/">
                    <x-button type="submit"
                              class="rounded-3xl border px-3 font-light text-md border-cyan text-cyan-dark">AMS
                    </x-button>


                </form>
            </div>


        </div>


        <div class="flex items-center justify-between lg:hidden">
            <x-nav-link href="{{ route('home') }}">
                Home
            </x-nav-link>
            <button id="menu-toggle" class="rounded-md p-2 text-cyan-dark focus:outline-none">
                <!-- Menu Icon (Hamburger) -->
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Menu Links -->
        <div id="menu-links" class="mt-2 hidden flex-col items-center lg:space-x-4 lg:mt-0 lg:flex lg:flex-row">
            <x-nav-link href="{{ route('home') }}">
                Home
            </x-nav-link>

            @guest
                <x-nav-link href="{{ route('register') }}">
                    Register
                </x-nav-link>
                <x-nav-link href="{{ route('login') }}">
                    Login
                </x-nav-link>
            @endguest

            @auth
                @if(Auth::user()->role == 'student')
                    <x-nav-link href="{{ route('student.dashboard') }}">
                        Dashboard
                    </x-nav-link>
                @endif

                @if(Auth::user()->role == 'professor')
                    <x-nav-link href="{{ route('professor.students') }}">
                        Students
                    </x-nav-link>
                    <x-nav-link href="{{route('professor.all.activities')}}">
                        Activities
                    </x-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button class="rounded-2xl px-3 py-2 text-sm bg-cyan-dark hover:bg-red" type="submit">
                        Logout
                    </x-button>
                </form>
            @endauth
        </div>

    </div>

</nav>
