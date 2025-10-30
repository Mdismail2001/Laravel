@extends('layouts.base')
@section('title', 'All Tasks')
@section('content')


<div class="w-full bg-red rounded-2xl shadow-lg p-4 ">
<div class="flex justify-between items-center mb-6 sticky top-0 bg-white z-20 shadow-sm p-4 rounded-md">
  <h1 class="text-3xl font-semibold text-gray-800">Task List</h1>

  @if (session('success'))
  <div id="success-message" class="bg-green-100 text-green-600 p-3 rounded transition-opacity duration-500">
    {{ session('success') }}
  </div>
  @endif

  <a href="javascript:void(0)" 
       onclick="showCreateModal('{{ route('create-task') }}')"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
       + Add Task
  </a>
</div>

  <div class="grid grid-cols-12 gap-6">

    <div class="col-span-8 h-[500px] overflow-y-auto bg-white shadow-md rounded-md">
      <table class="w-full border-collapse">
        <thead class="sticky top-0 bg-gray-50 z-10">
          <tr class="text-gray-700 uppercase text-sm leading-normal border-b">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Name</th>
            <th class="py-3 px-6 text-left">Status</th>
            <th class="py-3 px-6 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
          @foreach ($tasks as $task)
          <tr class="hover:bg-gray-100 transition">
            <td class="py-3 px-6">{{ $task->id }}</td>
            <td class="py-3 px-6 font-medium">{{ $task->name }}</td>
            <td class="py-3 px-6 font-medium">
              @php
                  $statusColors = [
                      'pending' => 'bg-yellow-100 text-yellow-700',
                      'in-progress' => 'bg-blue-100 text-blue-700',
                      'completed' => 'bg-green-100 text-green-700',
                  ];
                  $colorClass = $statusColors[$task->status] ?? 'bg-gray-100 text-gray-700';
              @endphp

              <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colorClass }}">
                  {{ ucfirst($task->status) }}
              </span>
            </td>
            <td class="py-3 px-6 text-center space-x-2">
              <a href="javascript:void(0)"
                onclick="showViewModal('{{ route('view-task', $task->id) }}', '{{ $task->name }}', '{{ $task->description }}')"
                class="px-3 py-1 bg-green-500 text-white rounded-md text-xs hover:bg-green-600 transition">
                View
              </a>
              <a href="javascript:void(0)"
                onclick="showEditModal('{{ route('edit', $task->id) }}', '{{ $task->name }}', '{{ $task->description }}')"
                class="px-3 py-1 bg-yellow-500 text-white rounded-md text-xs hover:bg-yellow-600 transition">
                Edit
              </a>
              <a href="javascript:void(0)" 
                onclick="showDeleteModal('{{ route('delete-task', $task->id) }}')" 
                class="px-3 py-1 bg-red-500 text-white rounded-md text-xs hover:bg-red-600 transition">
                Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    <div class="col-span-4 bg-white  shadow-md p-4 h-[500px] overflow-y-auto">
      <h2 class="text-lg font-semibold text-gray-700 mb-3">Task Progress Overview</h2>
      <canvas id="progressChart" width="400" height="400"></canvas>
    </div>
</div>
<!-- Include JS files -->
 <script src="{{ asset('js/taskModal.js') }}"></script>


<!-- Push the  modal into the 'modals' stack -->
@push('modals')
  <x-delete-modal />
  <x-task-modal />
  <x-view-modal />
@endpush

@endsection



