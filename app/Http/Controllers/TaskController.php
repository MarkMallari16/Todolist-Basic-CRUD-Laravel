<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }
    //add task
    public function addTask(Request $request)
    {
        $request->validate([
            'taskInput' => 'required',
        ]);

        $data = Task::create([
            'task_name' => $request->taskInput,
        ]);
        session()->flash('success', 'Task added successfully!');

        return back();
    }
    //update task
    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);


        if ($request->filled('updateTaskInput')) {
            $task->task_name = $request->updateTaskInput;

            $task->save();
        } else {
            session()->flash('error', 'Task name cannot be empty.');
        }

        session()->flash('success', 'Task updated successfully.');

        

        return back();
    }

    //delete task
    public function deleteTask($id)
    {
        $task = Task::find($id);

        if (!$task) {
            session()->flash('error', 'Task not found.');
            return back();
        }

        $task->delete();

        session()->flash('success', 'Task deleted successfully!');

        return back();
    }
    //done task
    public function doneTask($id){
        $task = Task::find($id);

        if (!$task){
            session()->flash('error', 'Task not found.');
        }
        $task->delete();

        session()->flash('success','Task marked as done!');

        return back();
    }
}
