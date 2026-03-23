<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\TaiLieu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaiLieuController extends Controller
{
    public function index(): View
    {
        $sort = request()->get('sort', 'id');
        $direction = request()->get('direction', 'asc');

        $taiLieus = TaiLieu::query()
            ->with('danhMuc:id,madanhmuc,tendanhmuc')
            ->orderBy($sort, $direction)
            ->paginate(3)
            ->appends(request()->query());

        return view('tailieu.index', compact('taiLieus'));
    }

    public function create(): View|RedirectResponse
    {
        if (!DanhMuc::query()->exists()) {
            return redirect()
                ->route('danhmuc.create')
                ->with('warning', 'Bạn phải tạo ít nhất 1 danh mục trước khi tạo tài liệu.');
        }

        $danhMucs = DanhMuc::query()
            ->orderBy('tendanhmuc')
            ->get(['madanhmuc', 'tendanhmuc']);

        return view('tailieu.create', compact('danhMucs'));
    }

    public function store(Request $request): RedirectResponse
    {
        if (!DanhMuc::query()->exists()) {
            return redirect()
                ->route('danhmuc.create')
                ->with('warning', 'Bạn phải tạo ít nhất 1 danh mục trước khi tạo tài liệu.');
        }

        $validated = $request->validate([
            'matailieu' => ['required', 'unique:tailieus,matailieu', 'string', 'max:50'],
            'tentailieu' => ['required', 'string', 'max:255'],
            'tomtat' => ['required', 'string'],
            'madanhmuc' => ['required', 'string', 'exists:danhmucs,madanhmuc'],
        ], [
            'matailieu.required' => 'Vui lòng nhập mã tài liệu.',
            'matailieu.unique' => 'Mã tài liệu đã tồn tại.',
            'matailieu.max' => 'Mã tài liệu không được vượt quá 50 ký tự.',
            'tentailieu.required' => 'Vui lòng nhập tên tài liệu.',
            'tentailieu.max' => 'Tên tài liệu không được vượt quá 255 ký tự.',
            'tomtat.required' => 'Vui lòng nhập tóm tắt.',
            'madanhmuc.required' => 'Vui lòng chọn mã danh mục.',
            'madanhmuc.exists' => 'Mã danh mục không hợp lệ.',
        ]);
        TaiLieu::create($validated);

        return redirect()
            ->route('tailieu.create')
            ->with('success', 'Thêm mới tài liệu thành công.');
    }
}
