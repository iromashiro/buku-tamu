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
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppks_id')->constrained('ppks')->onDelete('cascade');
            $table->json('jenis_bantuan')->nullable();
            $table->date('tanggal_terima')->nullable();
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
        Schema::dropIfExists('penerima_bantuans');
    }
};
