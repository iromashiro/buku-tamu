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
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk', 100)->unique(); // Nomor Kartu Keluarga
            $table->string('alamat', 255);             // Alamat Keluarga
            $table->foreignId('kepala_keluarga_id')->nullable()->constrained('ppks')->onDelete('set null'); // Opsi untuk mereferensikan kepala keluarga
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
        Schema::dropIfExists('keluargas');
    }
};
