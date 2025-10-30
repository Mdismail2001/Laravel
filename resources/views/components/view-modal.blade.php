<!-- resources/views/components/view-modal.blade.php -->
<div id="viewModal" 
     class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">
    
    <!-- Close (X) Icon -->
    <button 
      onclick="closeViewModal()" 
      class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
      ✕
    </button>

    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">View Task</h2>

    <div class="space-y-3">
      <div>
        <p class="text-gray-600 font-semibold">Name:</p>
        <p id="viewTaskName" class="text-gray-800"></p>
      </div>

      <div>
        <p class="text-gray-600 font-semibold">Description:</p>
        <p id="viewTaskDescription" class="text-gray-800"></p>
      </div>
    </div>
  </div>
</div>
