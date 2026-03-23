<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiLieu extends Model
{
    //
    public function tailieus()
{
    return $this->hasMany(TaiLieu::class,'madanhmuc','madanhmuc');
}
}
