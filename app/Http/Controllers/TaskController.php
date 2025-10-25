<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // 🟢 Show all tasks
    public function allTask()
    {
        $tasks = Task::where('is_deleted', false)->get();
        return view('tasks.allTask', compact('tasks'));
    }

    // 🟢 Show create task form
    public function create()
    {
        return view('tasks.create');
    }

    // 🟢 Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_deleted' => false,
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }

    // 🟢 View a specific task
    public function viewTask($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.viewTask', compact('task'));
}
}
