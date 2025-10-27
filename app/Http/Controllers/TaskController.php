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

    // 🟢 View a specific task
    public function viewTask($id){
        $task = Task::findOrFail($id);
        return view('tasks.viewTask', ['task' => $task]);
    }


    // 🟢 Edit a specific task
    public function editTask($id){
        $task = Task::findOrFail($id);
        return view('tasks.editTask',['task' => $task]);
    }
    public function edit(Request $request, $id){
        // dd("Edit function called for task ID: " . $id);
        // // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->description = $request->description;

        // Save changes to database
        $task->save();

        // Redirect to task list with success message
        return redirect()->route('alltasks')->with('success', 'Task updated successfully!');
    }
}
