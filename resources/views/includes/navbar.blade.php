<nav class="bg-white top-0 sticky w-full border-b-2 shadow-md" x-data="{ isOpen: false }">

    <div id="navbar" class="mx-auto ml-[240px] px-4 sm:px-6 lg:px-8">
        <div class="flex h-[70px] items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i id="menu-icon" class="fa-solid fa-bars cursor-pointer"></i>
                </div>
            </div>
            @auth
            <div class="block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div class="flex">
                            <p class="text-black my-auto mr-4">{{ $user->name }}</p>

                            <button type="button" @click="isOpen = !isOpen" 
                            class="relative flex max-w-xs items-center rounded-full bg-[#4880FF] text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('uploads/' . $user->photo) }}" alt="">
                            </button>

                        </div>

                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @else
    <a href="/login" class="">Login</button>
        @endauth
</nav>