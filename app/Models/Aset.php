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
    public function letak()
        {
           return $this->belongsToMany(Letak::class);
        }
    public function jenis()
        {
           return $this->belongsTo(Jenis::class);
        }
    public function status()
        {
            return $this->belongsTo(Status::class);
        }   
}
