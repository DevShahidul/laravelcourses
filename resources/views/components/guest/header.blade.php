<header class="w-full h-16 bg-white border-b border-gray-100 shadow">
    <div class="container max-w-[440px] md:max-w-7xl w-full px-4 sm:px-6 lg:px-8 mx-auto flex justify-between items-center">
        <div class="flex items-center">
            <a href="/" class="inline-block">
                <img class="w-56" src="{{asset('assets/images/logo.png')}}" alt="Logo">
            </a>
            <nav class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('courses')" :active="request()->routeIs('courses')">
                    {{ __('Courses') }}
                </x-nav-link>
                <x-nav-link :href="route('courses')" :active="request()->routeIs('courses')">
                    {{ __('Books') }}
                </x-nav-link>
            </nav>
        </div>

        <!--Signup&login button-->
        <div class="flex items-center">
            <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Sign in</a>
            <a href="#" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Sign up</a>
        </div>
    </div>
</header>