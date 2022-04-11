<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kategori()
        {
           return $this->belongsTo(Kategori::class);
        }
    public function merek()
        {
           return $this->belongsTo(Merek::class);
        }
    public function posisi()
        {
           return $this->belongsTo(Posisi::class);
        }
}