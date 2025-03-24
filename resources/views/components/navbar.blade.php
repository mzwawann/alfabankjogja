<nav class="bg-gray-800 fixed top-0 left-0 w-full z-20" x-data="{ isOpen: false, isBlogOpen: false, isProfileOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <x-application-logo class="h-10"/>
                </div>
                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-4">
                        {{-- <x-nav-link href="/home" :active="request()->is('/')">Home</x-nav-link> --}}
                        @if (Route::has('login'))
                            <x-nav-link href="/" :active="request()->is('home')">
                                @auth
                                    Home
                                @else
                                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                @endauth
                            </x-nav-link>
                            <x-nav-link href="/marketing" :active="request()->is('marketing')">
                                @auth
                                    Marketing
                                @else
                                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                                @endauth
                            </x-nav-link>
                            <x-nav-link href="/akademik" :active="request()->is('akademik')">
                                @auth
                                    Akademik
                                @else
                                @endauth
                            </x-nav-link>
                            <x-nav-link href="/keuangan" :active="request()->is('keuangan')">
                                @auth
                                    Keuangan
                                @else
                                @endauth
                            </x-nav-link>
                            <x-nav-link href="/logistik" :active="request()->is('logistik')">
                                @auth
                                    Logistik
                                @else
                                @endauth
                            </x-nav-link>
                        @endif
                    </div>
                </div>
            </div>
            @if (Route::has('login'))
                @auth
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white font-medium' : 'text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('dashboard')" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                            clip-rule="evenodd" />
                                    </svg>{{ __('Dashboard') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="/posts" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1v2a1 1 0 0 0 1.707.707L9.414 13H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M8.023 17.215c.033-.03.066-.062.098-.094L10.243 15H15a3 3 0 0 0 3-3V8h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1v2a1 1 0 0 1-1.707.707L14.586 18H9a1 1 0 0 1-.977-.785Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Article') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="flex items-center">
                                        <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                        </svg>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <nav class="-mx-3 flex flex-1 justify-end mr-2">
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-gray-300 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>
                    </nav>
                @endauth
            @endif
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="isOpen = !isOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                    <svg class="h-6 w-6" x-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden mt-4" x-show="isOpen" @click.away="isOpen = false">
        <div class="px-2 pt-2 pb-3 space-y-4 sm:px-3 flex flex-col ml-4">
            @if (Route::has('login'))
                <x-nav-link href="/" :active="request()->is('home')">
                    @auth
                        Home
                    @else
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    @endauth
                </x-nav-link>
                <x-nav-link href="/marketing" :active="request()->is('marketing')">
                    @auth
                        Marketing
                    @else
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    @endauth
                </x-nav-link>
                <x-nav-link href="/akademik" :active="request()->is('akademik')">
                    @auth
                        Akademik
                    @else
                    @endauth
                </x-nav-link>
                <x-nav-link href="/keuangan" :active="request()->is('keuangan')">
                    @auth
                        Keuangan
                    @else
                    @endauth
                </x-nav-link>
                <x-nav-link href="/logistik" :active="request()->is('logistik')">
                    @auth
                        Logistik
                    @else
                    @endauth
                </x-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            {{-- <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="https://images.pexels.com/photos/906531/pexels-photo-906531.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">william ganteng ah ah</div>
                        <div class="text-sm font-medium leading-none text-gray-400">william@gmail.com</div>
                    </div>
                </div> --}}
            @if (Route::has('login'))
                <nav class="pt-4 pb-1 border-gray-200">
                    @auth
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-white mb-2">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="mt-6 space-y-1">

                                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Dashboard') }}
                                </x-responsive-nav-link>

                                <x-responsive-nav-link href="/pendaftaran" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1v2a1 1 0 0 0 1.707.707L9.414 13H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M8.023 17.215c.033-.03.066-.062.098-.094L10.243 15H15a3 3 0 0 0 3-3V8h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1v2a1 1 0 0 1-1.707.707L14.586 18H9a1 1 0 0 1-.977-.785Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Article') }}
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="flex items-center">
                                        <svg class="w-6 h-6 mr-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                        </svg>
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    @else
                    @endauth
                </nav>
            @endif
        </div>
    </div>
</nav>
