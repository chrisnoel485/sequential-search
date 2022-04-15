<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function aset()
        {
           return $this->belongsToMany(Aset::class);
        }
    public function letak()
        {
           return $this->belongsToMany(Letak::class);
        }
}
