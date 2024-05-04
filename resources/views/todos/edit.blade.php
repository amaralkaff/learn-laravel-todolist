<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-bold text-center mb-4">Edit Todo</h1>
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="task">
                                Task
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="task" type="text" placeholder="Enter task" name="task" value="{{ $todo->task }}" required>
                        </div>
                        <div class="flex items-center justify-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
