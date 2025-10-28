<div class=" w-full mt-0 mb-6">
    <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

        <!-- Logo / Title -->
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor"
                class="w-8 h-8 text-indigo-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
            </svg>
            <span class="text-xl font-semibold text-gray-800">{{ $title }}</span>
        </div>

        <!-- Dynamic Navigation Links -->
        <nav class="hidden md:flex space-x-6">
            @foreach ($links as $text => $url)
            <a href="{{ $url }}" class="text-gray-600 hover:text-indigo-600 font-medium">{{ $text }}</a>
            @endforeach
        </nav>

        <!-- User Profile -->
        <div class="flex items-center space-x-3">
            <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-9 h-9 rounded-full border">
            <span class="text-gray-700 font-medium hidden sm:block">Hi, {{ $username }}</span>
        </div>
        </div>
    </div>
    </header>
</div>