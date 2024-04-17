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
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTask= new Task;
        $newTask->name = $request->task["title"];
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $existingTask=Task::find(  $id );

        if( $existingTask ){
            $existingTask->completed = $request->task['completed'] ? true : false;
            $existingTask->save();
            return $existingTask;
        }

        return "Task not found.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingTask = Task::find( $id );

        if( $existingTask ){
            $existingTask->delete();
            return "Task successfully deleted.";
        }

        return "Task not found.";
    }
}
