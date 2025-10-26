<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Task</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col items-center py-10">

  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Add New Task</h1>

    @if ($errors->any())
      <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Task Name</label>
        <input type="text" name="name" class="w-full border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter task name" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter task description" required></textarea>
      </div>

      <div class="flex justify-between items-center">
        <a href="{{ route('alltasks') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Back to list</a>
        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
          Save Task
        </button>
      </div>
    </form>
  </div>

</body>
</html>
