<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Laravel</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-md p-8 space-y-3 rounded-lg bg-white shadow-lg">
                <h1 class="text-center text-2xl font-bold text-gray-800">Welcome to Todo App</h1>
                <p class="text-center text-gray-600">A simple todo app built with Laravel</p>

                <!-- Authentication Links -->
                <div class="mt-6 space-y-4">
                    @if (Route::has('login'))
                        <div class="space-y-4"> <!-- Adjusted spacing here -->
                            @auth
                                <a href="{{ url('/dashboard') }}">
                                    <x-primary-button class="w-full">
                                    Dashboard
                                    </x-primary-button>
                                </a>
                                <a href="{{ route('todos.index') }}">
                                    <x-secondary-button class="w-full">
                                    Todo List
                                    </x-secondary-button>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block">
                                    <x-primary-button class="w-full">
                                        Log in
                                    </x-primary-button>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block">
                                        <x-secondary-button class="w-full">
                                            Register
                                        </x-secondary-button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
