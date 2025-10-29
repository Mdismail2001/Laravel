<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * 🟢 Show all tasks
     */
    public function allTask()
    {
        $tasks = Task::where('is_deleted', false)->get();
        return view('tasks.allTask', compact('tasks'));
    }

    /**
     * 🟢 Store a new task
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,in-progress,completed',
        ], [
            'name.required' => 'Sila masukkan nama tugasan.',
            'name.string' => 'Nama tugasan mesti dalam bentuk teks.',
            'name.max' => 'Nama tugasan tidak boleh melebihi 255 aksara.',
            'description.required' => 'Sila masukkan penerangan untuk tugasan.',
            'description.string' => 'Penerangan mesti dalam bentuk teks.',
            'status.required' => 'Sila pilih status tugasan.',
            'status.in' => 'Status mesti salah satu daripada Pending, In Progress, atau Completed.',
        ]);

        // Create a new Task instance
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->is_deleted = false;
        $task->is_completed = false;

        // Save to database
        $task->save();

        // Redirect to task list with success message
        return redirect()->route('alltasks')->with('success', 'Task added successfully!');
    }

    /**
     * 🟢 View a specific task
     */
    public function viewTask($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.viewTask', ['task' => $task]);
    }

    /**
     * 🟢 Edit (load edit form)
     */
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.editTask',compact('task'));
    }

    /**
     * 🟡 Update an existing task
     */
    public function edit(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,in-progress,completed',
        ], [
            'name.required' => 'Sila masukkan nama tugasan.',
            'name.string' => 'Nama tugasan mesti dalam bentuk teks.',
            'name.max' => 'Nama tugasan tidak boleh melebihi 255 aksara.',
            'description.required' => 'Sila masukkan penerangan untuk tugasan.',
            'description.string' => 'Penerangan mesti dalam bentuk teks.',
            'status.required' => 'Sila pilih status tugasan.',
            'status.in' => 'Status mesti salah satu daripada Pending, In Progress, atau Completed.',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;

        // Save updates
        $task->save();

        return redirect()->route('alltasks')->with('success', 'Task updated successfully!');
    }

    /**
     *  Soft delete a specific task
     */
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->is_deleted = true;
        $task->save();

        return redirect()->route('alltasks')->with('success', 'Task deleted successfully!');
    }

    /**
     * 🟢 Show all tasks in progress
     */
    public function progressChart()
    {
        // Count tasks by status
        $completed = \App\Models\Task::where('status', 'completed')->count();
        $inProgress = \App\Models\Task::where('status', 'in-progress')->count();
        $pending = \App\Models\Task::where('status', 'pending')->count();

        // dd($completed, $inProgress, $pending);
        // Pass data to the view
        return view('tasks.progress', compact('completed', 'inProgress', 'pending'));
    }
}
