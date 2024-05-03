<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>

<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white shadow p-4">
        <div class="max-w-6xl mx-auto">
            <div class="font-semibold text-lg">Simple To Do List</div>
        </div>
    </nav>

    <div class="container mx-auto mt-10 max-w-4xl">
        <!-- Content -->
        <h1 class="text-center text-3xl font-semibold mb-6">To Do List</h1>
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <div class="bg-white shadow p-4 mb-6 rounded">

                    <!-- Alert -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative gap-2 mb-4"
                             role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative gap-2 mb-4"
                             role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <!-- Form -->
                    <form id="todo-form" action="{{ route('todo.post') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="text" class="flex-1 p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" name="task" id="todo-input"
                               placeholder="Add a new task" required value="{{ old('task') }}">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Save
                        </button>
                    </form>
                </div>
                <div class="bg-white shadow p-4 rounded">
                    <form id="search-form" action="" method="get" class="mb-4 flex gap-2">
                        <input type="text" class="flex-1 p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" name="search"
                               placeholder="Enter keyword">
                        <button class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                            Search
                        </button>
                    </form>

                    <ul class="space-y-2" id="todo-list">
                        @foreach ($data as $item)

                        <li class="bg-gray-100 p-3 rounded flex justify-between items-center">
                            <span>{{ $item->task }}</span>
                            <div class="btn-group">
                                <a href="{{ route('todo.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded">Edit</a>
                                <a href="{{ route('todo.delete', $item->id) }}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded">Delete</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
