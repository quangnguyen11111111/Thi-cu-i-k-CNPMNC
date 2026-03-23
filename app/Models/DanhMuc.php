<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmucs';

    protected $fillable = [
        'madanhmuc',
        'tendanhmuc',
        'mota',
    ];

    public function taiLieus()
    {
        return $this->hasMany(TaiLieu::class, 'madanhmuc', 'madanhmuc');
    }
}
