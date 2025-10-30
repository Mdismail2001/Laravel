@extends('layouts.base')
@section('title', 'All Tasks')
@section('content')


<div class="w-full bg-red rounded-2xl  p-4 ">
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

    <div class="col-span-9 h-[550px] overflow-y-auto bg-white ">
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
            <td class="py-3 px-6">{{ $loop->iteration }}</td>
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
            
            <td class="py-2 text-center space-x-4 flex justify-center">
            <!-- View -->
              <a href="javascript:void(0)"
                title="View Task"
                onclick="showViewModal('{{ route('view-task', $task->id) }}', '{{ $task->name }}', '{{ $task->description }}')"
                class="text-green-600 hover:text-green-800 transition">
                <x-heroicon-o-eye class="w-5 h-5" />
              </a>

              <!-- Edit -->
              <a href="javascript:void(0)"
                title="Edit Task"
                onclick="showEditModal('{{ route('edit', $task->id) }}', '{{ $task->name }}', '{{ $task->description }}', '{{ $task->status }}')"
                class="text-yellow-500 hover:text-yellow-700 transition">
                <x-heroicon-o-pencil-square class="w-5 h-5" />
              </a>

              <!-- Delete -->
              <a href="javascript:void(0)" 
                title="Delete Task"
                onclick="showDeleteModal('{{ route('delete-task', $task->id) }}')" 
                class="text-red-500 hover:text-red-700 transition">
                <x-heroicon-o-trash class="w-5 h-5" />
              </a>  
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    <div class="col-span-3 bg-white  p-4 h-auto ">
        <div class="flex flex-col items-center">

            <!-- Chart -->
             <div class="pb-10"><canvas id="progressChart" ></canvas></div>

            <!-- Stats -->
            <div class="grid grid-cols-3  gap-4 text-center w-full">
                <div class="p-2 rounded-xl bg-green-50 shadow-sm">
                    <p class="text-sm text-gray-500">Completed</p>
                    <p class="text-2xl font-semibold text-green-600">{{ $completed }}</p>
                </div>
                <div class="p-2 rounded-xl bg-blue-50 shadow-sm">
                    <p class="text-sm text-gray-500">In Progress</p>
                    <p class="text-2xl font-semibold text-blue-600">{{ $inProgress }}</p>
                </div>
                <div class="p-2 rounded-xl bg-yellow-50 shadow-sm">
                    <p class="text-sm text-gray-500">Pending</p>
                    <p class="text-2xl font-semibold text-yellow-600">{{ $pending }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include JS files -->
 <script src="{{ asset('js/taskModal.js') }}"></script>

 {{-- Pass the data to JS --}}
<script>
    window.taskData = {
        completed: {{ $completed }},
        inProgress: {{ $inProgress }},
        pending: {{ $pending }}
    };
</script>

{{-- Load external JS --}}
@vite('resources/js/progressChart.js')



<!-- Push the  modal into the 'modals' stack -->
@push('modals')
  <x-delete-modal />
  <x-task-modal />
  <x-view-modal />
@endpush

@endsection



