<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory,HasUuids;
    protected $guarded = ['id'];
    protected $fillable =['id_jadwal','jumlah','id_pembayaran',];

    public function jadwal() {
        return $this->belongsTo(jadwal::class,'id_jadwal');
    }

    public function pembayaran() {
        return $this->belongsTo(pembayaran::class,'id_pembayaran');
    }
}

