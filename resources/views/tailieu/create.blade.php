<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi Tai lieu</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Them moi Tai lieu</h1>

        <div class="mb-4">
            <a href="{{ route('tailieu.index') }}"
                class="inline-flex items-center rounded-md bg-gray-700 px-4 py-2 text-white hover:bg-gray-800">
                Xem danh sach Tai lieu
            </a>
        </div>

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

        <form action="{{ route('tailieu.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="matailieu" class="block text-sm font-medium text-gray-700">Ma tai lieu</label>
                <input type="text" id="matailieu" name="matailieu" value="{{ old('matailieu') }}"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="tentailieu" class="block text-sm font-medium text-gray-700">Ten tai lieu</label>
                <input type="text" id="tentailieu" name="tentailieu" value="{{ old('tentailieu') }}"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="tomtat" class="block text-sm font-medium text-gray-700">Tom tat</label>
                <textarea id="tomtat" name="tomtat" rows="5"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('tomtat') }}</textarea>
            </div>

            <div>
                <label for="madanhmuc" class="block text-sm font-medium text-gray-700">Ma danh muc</label>
                <select id="madanhmuc" name="madanhmuc"
                    class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">-- Chon danh muc --</option>
                    @foreach ($danhMucs as $danhMuc)
                        <option value="{{ $danhMuc->madanhmuc }}" @selected(old('madanhmuc') === $danhMuc->madanhmuc)>
                            {{ $danhMuc->tendanhmuc }} ({{ $danhMuc->madanhmuc }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Luu Tai lieu
                </button>
            </div>
        </form>
    </div>
</body>

</html>
