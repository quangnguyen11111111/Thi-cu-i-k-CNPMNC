<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi Danh muc</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Them moi Danh muc</h1>

        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-100 border border-green-200 text-green-700 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-md bg-red-100 border border-red-200 text-red-700 px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('danhmuc.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="madanhmuc" class="block text-sm font-medium text-gray-700">Ma danh muc</label>
                <input
                    type="text"
                    id="madanhmuc"
                    name="madanhmuc"
                    value="{{ old('madanhmuc') }}"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <div>
                <label for="tendanhmuc" class="block text-sm font-medium text-gray-700">Ten danh muc</label>
                <input
                    type="text"
                    id="tendanhmuc"
                    name="tendanhmuc"
                    value="{{ old('tendanhmuc') }}"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <div>
                <label for="mota" class="block text-sm font-medium text-gray-700">Mo ta</label>
                <textarea
                    id="mota"
                    name="mota"
                    rows="5"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >{{ old('mota') }}</textarea>
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
                >
                    Luu Danh muc
                </button>
            </div>
        </form>
    </div>
</body>
</html>
