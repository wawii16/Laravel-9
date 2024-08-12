<aside id="sidebar" class="border-r-2 shadow-lg z-50 w-[240px] h-screen bg-white text-white fixed top-0 left-0 block transition-all duration-200" 
    x-data="{ open: localStorage.getItem('sidebarOpen') === 'true' || window.location.pathname.startsWith('/brands') || window.location.pathname.startsWith('/products') }" 
    x-init="$watch('open', value => localStorage.setItem('sidebarOpen', value))">

    <div class="flex flex-col h-full">

        <div class="flex-1 overflow-y-auto ">
            <div class="h-[70px] text-center">
                <a class="pt-6 text-black mr-[45px] ml-[66px] block" href="">Logo</a>
            </div>

            <ul>
                <li class="flex flex-col mx-6 mt-[11px]">
                    <a href="/" class="rounded-md flex py-4 gap-4 text-sm font-medium hover:bg-[#2b6afd] hover:text-white transition-all duration-200 {{ request()->is('/') ? 'bg-[#2b6afd] text-white' : 'bg-white text-black' }}">
                        <i class="fa-solid fa-gauge my-auto mx-4"></i> Dashboard
                    </a>
                    <li class="mx-6">
                        <button @click="open = !open" class="w-full flex items-center justify-between py-4 px-4 rounded-md text-sm font-medium text-black transition-colors duration-200">
                            <i class="fa-solid fa-user-tie"></i>
                            <span class="mr-5">Admin</span>
                            <i :class="open ? 'fa-solid fa-chevron-right rotate-90' : 'fa-solid fa-chevron-right'" class="ml-2 transition-all duration-400"></i>
                        </button>
                        <ul x-show="open" @click="open = false" x-transition class="space-y-1 pl-6 mb-2">
                            <li>
                                <a href="/brands" class="block pl-2 py-2 text-sm font-medium rounded-md hover:bg-[#2b6afd] hover:text-white transition-colors duration-200 {{ request()->is('brands') ? 'bg-[#2b6afd] text-white' : 'text-black' }}">Brands</a>
                            </li>
                            <li>
                                <a href="/products" class="block pl-2 py-2 text-sm font-medium rounded-md hover:bg-[#2b6afd] hover:text-white transition-colors duration-200 {{ request()->is('products') ? 'bg-[#2b6afd] text-white' : 'text-black' }}">Products</a>
                            </li>
                        </ul>
                    </li>
                </li>
            </ul>
            <div class="p-4 bottom-0 absolute border-t-2 w-full">
                <a href="/logout" class="block px-4 py-2 text-sm font-medium text-red-500 hover:bg-gray-700">Sign out</a>
            </div>
        </div>

    </div>
</aside>
