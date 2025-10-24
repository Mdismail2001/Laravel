<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route ::get ("/create-task", [TaskController::class, 'create'])->name('create-task');