@extends('layouts.base')
@section('title', 'Edit Task')
@section('content')
<div>
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Task</h1>
    
    <div class="bg-white p-6 rounded-2xl shadow-lg max-w-md">
        <form action="{{ route('edit', $task->id) }}" method="POST" class="space-y-4">

            @csrf
            <!-- @method('PUT') -->
            
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Task Name</label>
                <input type="text" id="name" name="name" value="{{ $task->name }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="4" 
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ $task->description }}</textarea>
            </div>
            
            <div class="flex justify-between items-center">
                <a href="{{ route('alltasks') }}" 
                   class="text-blue-600 hover:underline">Back to All Tasks</a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Update Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection