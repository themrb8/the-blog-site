<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>All articles</title>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">All articles</h1>

        <div class="mb-4">
            <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create New Article</a>
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $article->title }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('articles.destroy', ['article' => $article]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
