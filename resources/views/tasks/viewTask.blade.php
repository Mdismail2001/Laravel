@extends('layouts.base')
@section('title', 'View Task')
@section('content')

<div>
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">View Task</h1>
    
    <div class="bg-white p-6 rounded-2xl shadow-lg max-w-md">
        <h2 class="text-2xl font-medium text-gray-800 mb-4 text-red-500">{{ $task->name }}</h2>
        <p class="text-gray-600">{{ $task->description }}</p>
        <a href="{{route('alltasks')}}">Back to AllTask</a>
    </div>
</div>
@endsection