<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>tag Page</title>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">

        <div class="flex space-between">
        <h2 class="text-3xl font-semibold mb-6 flex-1">All tags</h2>
        <a class="text-3xl font-semibold mb-6 flex-1 underline" href="{{ route('tags.create') }}">Add New tag</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- Example tag Card -->
            @foreach($tags as $tag_item)
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-xl font-semibold">{{$tag_item->name}}</h3>
                <span><a href="{{ route('tags.edit', ['tag' => $tag_item]) }}">Edit</a></span>
                <form action="{{ route('tags.destroy', ['tag' => $tag_item]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white">Delete</button>
                </form>
            </div>
            @endforeach

            <!-- Repeat this block for each tag in your loop -->

        </div>

    </div>

</body>
</html>
