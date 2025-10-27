@extends('layouts.base')
@section('title', 'Edit Task')
@section('content')
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Add New Task</h1>
        <x-back-button />  
        </div>
        <x-dynamic-form action="{{ route('edit', $task->id) }}" method="POST">
            <div>
                <label class="block text-gray-700">Event Title</label>
                <input type="text" name="name" value="{{ $task->name }}" class="border rounded p-2 w-full">
            </div>

            <div>
                <label class="block text-gray-700">Date</label>
                <input type="text" name="description" value="{{ $task->description }}" class="border rounded p-2 w-full">
            </div>

            <x-slot name="buttonText">Update Task</x-slot>
        </x-dynamic-form>
</div>
@endsection