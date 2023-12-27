<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <div class="bg-gray-100 h-screen">
            <div class="container mx-auto p-8">
                <div class="flex space-between">
                    <h2 class="text-3xl font-semibold mb-6 flex-1">All Articles</h2>
                    <a class="text-3xl font-semibold mb-6 flex-1 underline" href="{{ route('articles.create') }}">Add New Article</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                    <!-- Example Category Card -->
                    @foreach($articles as $article)
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h3 class="text-xl font-semibold">{{$article->title}}</h3>
                        <span><a href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a></span>
                        <form action="{{ route('articles.destroy', ['article' => $article]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white">Delete</button>
                        </form>
                    </div>
                    @endforeach

                    <!-- Repeat this block for each category in your loop -->

                </div>

            </div>
        </div>
        <!-- End Page Content -->
    </div>
</body>

</html>