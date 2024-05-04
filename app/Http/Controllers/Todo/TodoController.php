<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(10);

        return view('todos.index', compact('todos'));
    }


    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'task' => 'required|string|max:255|min:3'
    ]);

    $validatedData['user_id'] = auth()->id();

    Todo::create($validatedData);

    return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);  // Ensures only the owner can view
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);  // Ensures only the owner can edit
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);  // Ensures only the owner can update
        // Validation and update logic
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);  // Ensures only the owner can delete
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

}
