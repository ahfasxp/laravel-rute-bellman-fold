<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;

    public function desa()
    {
        return $this->hasOne("App\Models\Desa");
    }

    public function kecamatan()
    {
        return $this->hasOne("App\Models\Kecamatan");
    }
}
