<?php

use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('example.about');
// });

Route::get('/example', [ExampleController::class, 'index']);

Route::get('todo', [TodoController::class, 'index'])->name('todo');
Route::post('todo', [TodoController::class, 'store'])->name('todo.post');
Route::delete('todo/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
Route::put('todo/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::get('todo/{id}', [TodoController::class, 'show'])->name('todo.show');
Route::get('todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('todo/{id}/complete', [TodoController::class, 'complete'])->name('todo.complete');
Route::get('todo/{id}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');

