<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <a href="{{ route('todos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Todo</a>
                    </div>
                    <ul>
                        @foreach ($todos as $todo)
                        <li class="bg-gray-100 p-4 rounded-lg shadow mb-4 flex justify-between items-center">
                            {{ $todo->task }}
                            <div>
                                <a href="{{ route('todos.edit', $todo) }}" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('todos.destroy', $todo) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
