@extends('layouts.base')
@section('title', 'View Task')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
    
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">View Task</h1>
    
    <!-- Task Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="text-left px-6 py-3 text-gray-700 font-semibold">Task Name</th>
                    <th class="text-left px-6 py-3 text-gray-700 font-semibold">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-800">{{ $task->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $task->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- this is a dynamic button use for go to the back page -->
    <div class="flex justify-center mt-6">
        <x-back-button />   
    </div>  
</div>

@endsection
