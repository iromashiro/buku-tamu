<?php

namespace Database\Seeders;

use App\Models\Icd10;
use App\Models\RekamMedik;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("role")->insert([
            "nama_role" => "super"
        ]);
        DB::table("users")->insert([
            "username" => "superadmin",
            "password" => Hash::make("12345678"),
            "email" => "superadmin@test.com",
            "id_role" => 1
        ]);

        $jenis_pmks = [
            ['nama_pmks' => 'Anak Balita Telantar'],
            ['nama_pmks' => 'Anak Telantar'],
            ['nama_pmks' => 'Keluarga bermasalah sosial psikologis'],
            ['nama_pmks' => 'Penyandang Disabilitas'],
            ['nama_pmks' => 'Tuna Susila'],
            ['nama_pmks' => 'Gelandangan'],
            ['nama_pmks' => 'Pengemis'],
            ['nama_pmks' => 'Pemulung'],
            ['nama_pmks' => 'Kelompok Minoritas'],
            ['nama_pmks' => 'Bekas Warga Binaan Pemasyarakatan (BWBP)'],
            ['nama_pmks' => 'Orang dengan HIV/AIDS (ODHA)'],
            ['nama_pmks' => 'Korban Penyalahgunaan NAPZA'],
            ['nama_pmks' => 'Korban Trafficking'],
            ['nama_pmks' => 'Korban Tindak Kekerasan'],
            ['nama_pmks' => 'Pekerja Migran Bermasalah Sosial (PMBS)'],
            ['nama_pmks' => 'Korban Bencana Alam'],
            ['nama_pmks' => 'Korban Bencana Sosial'],
            ['nama_pmks' => 'Perempuan Rawan Sosial Ekonomi'],
            ['nama_pmks' => 'Fakir Miskin'],
            ['nama_pmks' => 'Keluarga bermasalah sosial psikologis'],
            ['nama_pmks' => 'Keluarga Berumah Tidak Layak Huni'],
            ['nama_pmks' => 'Anak berhadapan dengan hukum'],
            ['nama_pmks' => 'Anak Jalanan'],
            ['nama_pmks' => 'Lanjut Usia Telantar'],
            ['nama_pmks' => 'Penyandang Disabilitas Orang dengan HIV/AIDS (ODHA)'],
            ['nama_pmks' => 'Komunitas Adat Terpencil']
        ];

        DB::table('jenis_pmks')->insert($jenis_pmks);

        $jenis_bantuan = [
            ['nama_bantuan' => 'RST'],
            ['nama_bantuan' => 'BLT BBM'],
            ['nama_bantuan' => 'SEMBAKO ADAPTIF'],
            ['nama_bantuan' => 'BLT MIGOR'],
            ['nama_bantuan' => 'YATIM PIATU'],
            ['nama_bantuan' => 'PERMAKANAN'],
            ['nama_bantuan' => 'PENA'],
            ['nama_bantuan' => 'BPNT-PPKM'],
            ['nama_bantuan' => 'BST'],

        ];

        DB::table('jenis_bantuans')->insert($jenis_bantuan);

        Artisan::call('laravolt:indonesia:seed');
    }
}
