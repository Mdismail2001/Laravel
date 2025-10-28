<div id="deleteModal" 
     class="fixed inset-0 hidden z-50 flex items-center justify-center 
            bg-gray-900/40 backdrop-blur-sm">
  <div class="bg-white rounded-xl shadow-2xl p-6 w-96 relative">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Delete</h2>
    <p class="text-sm text-gray-600 mb-6">Are you sure you want to delete this task?</p>

    <div class="flex justify-end space-x-3">
      <button id="cancelDelete" 
              class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
        Cancel
      </button>
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
          Delete
        </button>
      </form>
    </div>
  </div>
</div>
