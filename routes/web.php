<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



// Home Route - Show all tasks
Route::get('/', [TaskController::class, 'allTask'])->name('alltasks');

// Create Task Route
Route ::post("/create-task", [TaskController::class, 'store'])->name('create-task');

// view specific Task Route
Route ::get("/view-task/{id}", [TaskController::class, 'viewTask'])->name('view-task');

// Edit Task Route
Route::post('/edit/{id}', [TaskController::class, 'edit'])->name('edit');

// Delete Task Route
Route:: delete('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('delete-task');