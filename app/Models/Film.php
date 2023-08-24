<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory,HasUuids;
    protected $fillable =['id','judul','deskripsi','durasi','genre','foto'];
    public function jadwal():HasMany{
        return $this->hasMany(jadwal::class);

    }
}
