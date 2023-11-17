<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            "name" => "Ketua",
            "description" => "Bertugas untuk mengawasi dan mengatur jalannya pekerjaan"
        ]);
        Position::create([
            "name" => "Anggota",
            "description" => "Menjalankan apa yang sudah ditetapkan"
        ]);

    }
}
