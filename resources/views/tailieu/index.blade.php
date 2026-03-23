<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach Tai lieu</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        {{-- Tôi muốn có một nút đăng xuất khi người dùng chọn thì sẽ set lại session login thành false --}}
        <div class="">
            <a href="{{ route('auth.logout') }}" class="text-red-500 hover:text-red-700">Đăng xuất</a>
        </div>
        <div class="flex items-center justify-between mb-6 gap-3">
            <h1 class="text-2xl font-bold">Danh sách Tài liệu</h1>
            <div class="">
                <a href="{{ route('danhmuc.create') }}"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Thêm mới danh mục
                </a>
                <a href="{{ route('tailieu.create') }}"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Thêm mới tài liệu
                </a>

            </div>
        </div>

        @if ($taiLieus->isEmpty())
            <div class="rounded-md bg-yellow-100 border border-yellow-200 text-yellow-700 px-4 py-3">
                Chưa có tài liệu nào. Hãy thêm mới tài liệu để hiển thị ở đây.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            <th class="px-4 py-3 border-b text-left text-sm font-semibold text-gray-700"
                                title="Hãy ấn để sắp xếp lại">
                                <a
                                    href="{{ route('tailieu.index', ['sort' => 'id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    ID
                                </a>
                            </th>
                            <th class="px-4 py-3 border-b text-left text-sm font-semibold text-gray-700"
                                title="Hãy ấn để sắp xếp lại">
                                <a
                                    href="{{ route('tailieu.index', ['sort' => 'matailieu', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Mã tài liệu
                                </a>
                            </th>
                            <th class="px-4 py-3 border-b text-left text-sm font-semibold text-gray-700"
                                title="Hãy ấn để sắp xếp lại">
                                <a
                                    href="{{ route('tailieu.index', ['sort' => 'tentailieu', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Tên tài liệu
                                </a>
                            </th>
                            <th class="px-4 py-3 border-b text-left text-sm font-semibold text-gray-700">Tóm tắt</th>
                            <th class="px-4 py-3 border-b text-left text-sm font-semibold text-gray-700">Tên danh mục
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taiLieus as $taiLieu)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b text-sm text-gray-700">{{ $taiLieu->id }}</td>
                                <td class="px-4 py-3 border-b text-sm text-gray-700">{{ $taiLieu->matailieu }}</td>
                                <td class="px-4 py-3 border-b text-sm text-gray-700">{{ $taiLieu->tentailieu }}</td>
                                <td class="px-4 py-3 border-b text-sm text-gray-700">{{ $taiLieu->tomtat }}</td>
                                <td class="px-4 py-3 border-b text-sm text-gray-700">
                                    {{ $taiLieu->danhMuc->tendanhmuc ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $taiLieus->links() }}
            </div>
        @endif
    </div>
</body>

</html>
