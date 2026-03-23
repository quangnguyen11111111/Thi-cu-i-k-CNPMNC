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
            'madanhmuc' => ['required', 'string', 'max:50'],
            'tendanhmuc' => ['required', 'string', 'max:255'],
            'mota' => ['required', 'string'],
        ], [
            'madanhmuc.required' => 'Vui long nhap ma danh muc.',
            'madanhmuc.max' => 'Ma danh muc khong duoc vuot qua 50 ky tu.',
            'tendanhmuc.required' => 'Vui long nhap ten danh muc.',
            'tendanhmuc.max' => 'Ten danh muc khong duoc vuot qua 255 ky tu.',
            'mota.required' => 'Vui long nhap mo ta.',
        ]);

        DanhMuc::create($validated);

        return redirect()
            ->route('danhmuc.create')
            ->with('success', 'Them moi danh muc thanh cong.');
    }
}
