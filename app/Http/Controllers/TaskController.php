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

    // 🟢 Show the create task form
    public function create()
    {
        return view('tasks.create');
    }

    // 🟢 Store the new task in the database
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new Task instance
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->is_deleted = false;
        $task->is_completed = false;

        // Save to database
        $task->save();

        // Redirect to task list with success message
        return redirect()->route('alltasks')->with('success', 'Task added successfully!');
    }
}
