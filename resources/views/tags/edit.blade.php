<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Update a tag</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6">Update a tag</h2>

        <!-- Form -->
        <form action="{{ route('tags.update', $tag->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- tag Name Input -->
            <div class="mb-4">
                <label for="tag" class="block text-gray-600 text-sm font-medium mb-2">tag Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" value="{{ old('name', $tag->name ) }}" placeholder="Enter tag name" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update tag</button>

        </form>
    </div>

</body>
</html>
