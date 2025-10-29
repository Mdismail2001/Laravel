@extends('layouts.base')
@section('title', 'Task Progress')
@section('content')

<div class="flex items-center justify-center bg-white">
    <div class="w-full bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Progress Overview
        </h2>

        <div class="flex flex-col items-center">
            <canvas id="progressChart" class="w-full max-w-md"></canvas>

            <div class="mt-8 grid grid-cols-3 gap-6 text-center">
                <div class="p-4 rounded-xl bg-green-50 shadow-sm">
                    <p class="text-sm text-gray-500">Completed</p>
                    <p class="text-2xl font-semibold text-green-600">{{ $completed }}</p>
                </div>
                <div class="p-4 rounded-xl bg-blue-50 shadow-sm">
                    <p class="text-sm text-gray-500">In Progress</p>
                    <p class="text-2xl font-semibold text-blue-600">{{ $inProgress }}</p>
                </div>
                <div class="p-4 rounded-xl bg-yellow-50 shadow-sm">
                    <p class="text-sm text-gray-500">Pending</p>
                    <p class="text-2xl font-semibold text-yellow-600">{{ $pending }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection
