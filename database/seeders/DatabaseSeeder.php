<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        User::create([
            'name'=>"yusuf",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt("12345678"),

        ]);
        Film::create([
            'judul'=>"Pengabdi Setan 2",
            "deskripsi"=>"Pengabdi Setan menceritakan tentang keluarga Rini (Tara Basro) dan dua adiknya yang sedang kesulitan mencari uang untuk pengobatan ibunya. Mawarni (Ayu Laksmi), sang ibu yang merupakan mantan penyanyi terkenal, menderita penyakit yang berat dan membutuhkan biaya pengobatan yang sangat besar",
            "durasi"=>"125",
            "genre"=>"Horor",
            "foto"=>"1687747463pengabdi setan 2.png"

        ]);
    }
}
