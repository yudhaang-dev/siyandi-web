<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostType::insert([
            [ 'name' => 'tentang-kami' ],
            [ 'name' => 'berita' ],
            [ 'name' => 'kegiatan' ],
            [ 'name' => 'lowongan-kerja' ],
        ]);
    }
}
