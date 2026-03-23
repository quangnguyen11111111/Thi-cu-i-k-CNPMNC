<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    //
        public function danhmucs()
{    return $this->hasMany(TaiLieu::class,'madanhmuc','madanhmuc');}
}
