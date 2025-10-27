<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
        $backUrl = $route ? route($route) : url()->previous();
    @endphp

    <a href="{{ $backUrl }}" 
    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
        <!-- Cross (X) icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>

</div>