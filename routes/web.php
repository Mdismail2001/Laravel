<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/tasks', [TaskController::class, 'allTask'])->name('tasks');

Route ::get ("/create-task", [TaskController::class, 'create'])->name('create-task');

Route::get('/tasks/{id}', [TaskController::class, ' viewTask'])->name('view-task');