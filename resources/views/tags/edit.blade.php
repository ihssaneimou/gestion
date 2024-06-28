<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier tag</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-xl p-5 bg-white rounded-lg shadow">
        <h1 class="text-xl font-semibold text-gray-700 mb-5">Modifier tag</h1>
        @if(session('success'))
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('tags.update', $tag) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                <input type="text" id="nom" name="nom" value="{{ $tag->nom }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Enregistrer les modifications</button>
        </form>
    </div>
</body>
</html>