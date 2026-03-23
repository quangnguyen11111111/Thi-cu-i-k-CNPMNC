<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DanhMucController extends Controller
{
    public function create(): View
    {
        return view('danhmuc.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'madanhmuc' => ['required', 'unique:danhmucs,madanhmuc', 'string', 'max:50'],
            'tendanhmuc' => ['required', 'string', 'max:255'],
            'mota' => ['required', 'string'],
        ], [
            'madanhmuc.required' => 'Vui lòng nhập mã danh mục.',
            'madanhmuc.unique' => 'Mã danh mục đã tồn tại.',
            'madanhmuc.max' => 'Mã danh mục không được vượt quá 50 ký tự.',
            'tendanhmuc.required' => 'Vui lòng nhập tên danh mục.',
            'tendanhmuc.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'mota.required' => 'Vui lòng nhập mô tả.',
        ]);

        DanhMuc::create($validated);

        return redirect()
            ->route('danhmuc.create')
            ->with('success', 'Thêm mới danh mục thành công.');
    }
}
