@extends('layouts.base')
@section('title', 'Add Tasks')
@section('content')

  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">Add New Task</h1>
      <x-back-button />   
    </div>

    @if ($errors->any())
      <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <x-dynamic-form action="{{ route('store') }}" method="POST">
            <div>
                <label class="block text-gray-700">Task Name</label>
                <input type="text" name="name" class="border rounded p-2 w-full">
            </div>
          <div>
              <label class="block text-gray-700">Description</label>
              <textarea name="description" class="border rounded p-2 w-full"></textarea>
          </div>

          <x-slot name="buttonText">Create Task</x-slot>

    </x-dynamic-form>


  </div>

@endsection