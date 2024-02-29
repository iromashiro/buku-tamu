<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 100)->unique()->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('nama_wali', 100)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('pendidikan', 100)->nullable();
            $table->string('hubungan_keluarga', 100)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->foreignId('provinsi_id')->constrained('indonesia_provinces')->onDelete('cascade');
            $table->foreignId('kabupaten_id')->constrained('indonesia_cities')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->constrained('indonesia_districts')->onDelete('cascade');
            $table->foreignId('desa_id')->constrained('indonesia_villages')->onDelete('cascade');
            $table->json('jenis_pmks')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppks');
    }
};
