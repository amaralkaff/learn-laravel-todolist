<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todo::orderBy('created_at', 'desc')->get();
        return view('todo.app', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:25|min:3',
        ], [
            'task.required' => 'Please enter a task.',
            'task.string' => 'Task must be a string.',
            'task.max' => 'Task must not exceed 25 characters.',
            'task.min' => 'Task must be at least 3 characters.',
        ]);

        $data = [
            'task' => $request->input('task'),
        ];

        Todo::create($data);
        return redirect()->route('todo')->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Todo::find($id);
        return view('todo.show', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Todo::find($id);
        return view('todo.edit', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|string|max:25|min:3',
        ], [
            'task.required' => 'Please enter a task.',
            'task.string' => 'Task must be a string.',
            'task.max' => 'Task must not exceed 25 characters.',
            'task.min' => 'Task must be at least 3 characters.',
        ]);

        $data = [
            'task' => $request->input('task'),
        ];

        Todo::find($id)->update($data);
        return redirect()->route('todo')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Todo::find($id);
        $data->delete();
        return redirect()->route('todo')->with('success', 'Task deleted successfully.');
    }
}
