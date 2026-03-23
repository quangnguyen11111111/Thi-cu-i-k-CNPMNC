<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaiLieuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'matailieu' => ['required', 'string', 'max:50'],
            'tentailieu' => ['required', 'string', 'max:255'],
            'tomtat' => ['required', 'string'],
            'madanhmuc' => ['required', 'string', 'exists:danhmucs,madanhmuc'],
        ];
    }

    public function messages(): array
    {
        return [
            'matailieu.required' => 'Vui long nhap ma tai lieu.',
            'matailieu.max' => 'Ma tai lieu khong duoc vuot qua 50 ky tu.',
            'tentailieu.required' => 'Vui long nhap ten tai lieu.',
            'tentailieu.max' => 'Ten tai lieu khong duoc vuot qua 255 ky tu.',
            'tomtat.required' => 'Vui long nhap tom tat.',
            'madanhmuc.required' => 'Vui long chon ma danh muc.',
            'madanhmuc.exists' => 'Ma danh muc khong hop le.',
        ];
    }
}
