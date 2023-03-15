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
        Schema::create('data_surat', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->string('nomor_surat');
            $table->string('kategori_surat');
            $table->dateTime('tgl_surat');
            $table->string('tujuan_pengiriman');
            $table->string('perihal');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable();
            $table->string('foto_surat')->nullable();
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
        Schema::dropIfExists('data_surat');
    }
};
