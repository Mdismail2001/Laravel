<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;




Route::get('/', [TaskController::class, 'allTask'])->name('alltasks');

Route ::get("/create-task", [TaskController::class, 'create'])->name('create-task');

Route ::post("/store", [TaskController::class, 'store'])->name('store');

Route ::get("/view-task/{id}", [TaskController::class, 'viewTask'])->name('view-task');

// Edit Task Route
Route:: get('/edit-task/{id}', [TaskController::class, 'editTask'])->name('edit-task');
Route:: post('/edit/{id}', [TaskController::class, 'edit'])->name('edit');