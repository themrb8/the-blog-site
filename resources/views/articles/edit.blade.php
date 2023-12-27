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
        <div class="bg-gray-100 h-screen flex items-center justify-center">

            <div class="bg-white p-8 rounded shadow-md w-96">
                <h2 class="text-2xl font-semibold mb-6">Edit an Article</h2>

                <form action="{{ route('articles.update', ['article' => $article]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-600 text-sm font-medium mb-2">Title</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter article title" required value="{{ old('title', $article->title) }}">
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-4">
                        <label for="category" class="block text-gray-600 text-sm font-medium mb-2">Category</label>
                        <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $article->category && $article->category->id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tags Multi-Select -->
                    <div class="mb-4">
                        <label for="tags" class="block text-gray-600 text-sm font-medium mb-2">Tags</label>
                        <select id="tags" name="tags[]" multiple class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Content Textarea -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-600 text-sm font-medium mb-2">Content</label>
                        <textarea id="content" name="content" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter article content" required>{{ old('content', $article->content) }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Article</button>
                </form>

            </div>

        </div>
        <!-- End Page Content -->
    </div>
</body>

</html>