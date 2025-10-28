<div id="taskModal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h2 id="taskModalTitle" class="text-lg font-semibold text-gray-800 mb-4">Add New Task</h2>

    <form id="taskForm" method="POST" action="">
      @csrf
      {{-- This will be replaced dynamically with PUT when editing --}}
      <div class="mb-4">
        <label class="block text-gray-700 mb-1">Task Name</label>
        <input type="text" name="name" id="taskName" class="border rounded-md w-full p-2" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 mb-1">Description</label>
        <input type="text" name="description" id="taskDescription" class="border rounded-md w-full p-2" required>
      </div>

      <div class="flex justify-end space-x-3">
        <button type="button" id="cancelTaskModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
          Cancel
        </button>
        <button type="submit" id="taskSubmitBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Save Task
        </button>
      </div>
    </form>
  </div>
</div>
