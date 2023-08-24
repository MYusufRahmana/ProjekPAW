<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory,HasUuids;
    protected $guarded = ['id'];
    protected $fillable =['id_user','metode_pembayaran','total_biaya',];

    public function user() {
        return $this->belongsTo(user::class,'id_user');
    }

}
