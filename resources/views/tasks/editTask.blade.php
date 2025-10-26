@extends('layouts.base')
@section('title', 'Edit Task')
@section('content')

<div>
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Task</h1>
    <!-- Edit Task Form -->
    <form action="{{ route('store') }}" method="POST"  class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Task Name</label>
            <input type="text" name="name" id="name" value="{{ $task->name }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" required
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ $task->description }}</textarea>
        </div>
        
        <div>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                Update Task
            </button>
        </div>
    </form>
</div>

@endsection