<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::all();
        return response()->json($task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'name' => 'required|string|max:100',
           'description' => 'nullable|string|max:250',
           'difficulty' => 'required|in:easy,medium,hard',
           'completed' => 'required|boolean',
       ]);
       $task = Task::create($validatedData);
       return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        if(!$id) {
            return response()->json('Task not found', 404);
        }
        return response()->json($task, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:250',
            'difficulty' => 'required|in:easy,medium,hard',
            'completed' => 'required|boolean',
        ]);

        $task->update();
        return response()->json($task, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
      $task->delete();
      return response()->json('Message', 'Task deleted successfully');
    }
}
