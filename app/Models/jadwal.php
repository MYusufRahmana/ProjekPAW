<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory,HasUuids;
    
    protected $fillable =['id','tanggal','jam_tayang','id_film','id_cinema','harga'];

    public function film() {
        return $this->belongsTo(Film::class,'id_film');
    }

    public function cinema() {
        return $this->belongsTo(Cinema::class,'id_cinema');
    }
}
