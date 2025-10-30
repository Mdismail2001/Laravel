<div x-data="{ open: true }" class="flex justify-center items-center min-h-screen bg-gray-100">

    <!-- Overlay -->
    <div 
        x-show="open"
        class="fixed inset-0 bg-gray-800 bg-opacity-50"
        x-transition.opacity
        @click="open = false"
    ></div>

    <!-- Modal -->
    <div 
        x-show="open"
        x-transition
        class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 z-50 text-center"
    >
        <!-- Close Button -->
        <button 
            @click="open = false"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Task Details</h2>

        <!-- Task Info -->
        <div class="space-y-4">
            <div>
                <p class="text-gray-500 font-medium">Task Name</p>
                <p class="text-lg font-semibold text-gray-800">{{ $task->name }}</p>
            </div>
            <div>
                <p class="text-gray-500 font-medium">Description</p>
                <p class="text-gray-700">{{ $task->description }}</p>
            </div>
            <div>
                <p class="text-gray-500 font-medium">Status</p>
                <p class="text-gray-800 capitalize font-medium">{{ $task->status }}</p>
            </div>
        </div>
    </div>
</div>
