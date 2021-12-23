<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil')->insert([
            'nama' => 'Forte Pulito',
            'tentang_kami' => 'Forte pulito adalah penyedia jasa yang bergerak dibidang reparasi dan <br> perawatan sepatu dan tas. Forte Pulito baru berdiri sejak tahun 2020. Forte Pulito mempunyai 2 cabang, yaitu di Sidoarjo <br> dan Jombang.',
            'visi' => 'Menjadi jasa cuci sepatu yang dapat diminati banyak konsumen dengan harga yang <br> terjangkau, sehingga mampu memberikan kenyamanan bagi masyarakat dalam menggunakan sepatu <br> di kegiatan sehari – hari.',
            'misi' => '1. Memberikan kenyamanan dan pelayanan yang terbaik untuk konsumen <br>
                    2. Menjadi salah satu usaha yang dapat memberikan kebutuhan perawatan sepatu masyarakat.<br>
                    3. Menyediakan jasa perawatan sepatu yang berkualitas tinggi dengan harga yang terjangkau bagi masyarakat.',
            'alamat' => 'Jl. Nyi Cempo Barat, Kedungturi, Taman, Sidoarjo, Jawa Timur 61257 <br>
                    Jl. Jayabaya No.14, Kepajen, Jombang, Jawa Timur, Indonesia 61411',
            'no_hp' => '0812-5294-0788',
            'email' => 'fortepulito@gmail.com',
            'status' => 'Aktif',
            'gambar' => 'profil.jpg'
        ]);
    }
}
