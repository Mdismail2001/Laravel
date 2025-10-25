<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [TaskController::class, 'allTask'])->name('alltasks');

Route ::get("/create-task", [TaskController::class, 'create'])->name('create-task');

Route ::post("/store", [TaskController::class, 'store'])->name('store');


// Route::get('/tasks/{id}', [TaskController::class, ' viewTask'])->name('view-task');