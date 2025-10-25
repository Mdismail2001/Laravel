<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col items-center py-10">
  
  <div class="w-full max-w-5xl bg-white rounded-2xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Task List</h1>
      <a href="{{ route('create-task') }}"
         class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
         + Add Task
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-50 text-gray-700 uppercase text-sm leading-normal border-b">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Name</th>
            <th class="py-3 px-6 text-left">Description</th>
            <th class="py-3 px-6 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
          @foreach ($tasks as $task)
          <tr class="hover:bg-gray-100 transition">
            <td class="py-3 px-6">{{ $task->id }}</td>
            <td class="py-3 px-6 font-medium">{{ $task->name }}</td>
            <td class="py-3 px-6">{{ $task->description }}</td>
            <td class="py-3 px-6 text-center space-x-2">
              <a href="" 
                 class="px-3 py-1 bg-green-500 text-white rounded-md text-xs hover:bg-green-600 transition">
                    View
              </a>
              <a href="#" 
                 class="px-3 py-1 bg-yellow-500 text-white rounded-md text-xs hover:bg-yellow-600 transition">
                 Edit
              </a>
              <a href="#" 
                 class="px-3 py-1 bg-red-500 text-white rounded-md text-xs hover:bg-red-600 transition">
                 Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
