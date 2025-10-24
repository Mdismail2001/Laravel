<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_deleted', false)->get();
        return view('tasks.index', compact('tasks'));
    }
}
