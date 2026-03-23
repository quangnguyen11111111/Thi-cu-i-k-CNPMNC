<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaiLieuRequest;
use App\Models\DanhMuc;
use App\Models\TaiLieu;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaiLieuController extends Controller
{
    public function create(): View
    {
        $danhMucs = DanhMuc::query()
            ->orderBy('tendanhmuc')
            ->get(['madanhmuc', 'tendanhmuc']);

        return view('tailieu.create', compact('danhMucs'));
    }

    public function store(StoreTaiLieuRequest $request): RedirectResponse
    {
        TaiLieu::create($request->validated());

        return redirect()
            ->route('tailieu.create')
            ->with('success', 'Them moi tai lieu thanh cong.');
    }
}
