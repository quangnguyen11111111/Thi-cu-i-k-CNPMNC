<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiLieu extends Model
{
    protected $table = 'tailieus';

    protected $fillable = [
        'matailieu',
        'tentailieu',
        'tomtat',
        'madanhmuc',
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'madanhmuc', 'madanhmuc');
    }
}
