<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Article Form</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6">Create an Article</h2>

        <!-- Form -->
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <!-- Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-gray-600 text-sm font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter article title" required>
            </div>

            <!-- Category Dropdown -->
            <div class="mb-4">
                <label for="category" class="block text-gray-600 text-sm font-medium mb-2">Category</label>
                <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tags Multi-Select -->
            <div class="mb-4">
                <label for="tags" class="block text-gray-600 text-sm font-medium mb-2">Tags</label>
                <select id="tags" name="tags[]" multiple class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Content Textarea -->
            <div class="mb-4">
                <label for="content" class="block text-gray-600 text-sm font-medium mb-2">Content</label>
                <textarea id="content" name="content" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter article content" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Create Article</button>
        </form>
    </div>

</body>
</html>
