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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
        $table->string('nm_karyawan');
        $table->string('tempat_tinggal');
        $table->date('tanggal_lahir');
        $table->string('bidang_studi');
        $table->string('status_kepegawaian');
        $table->unsignedBigInteger('id_jabatan');
        $table->unsignedBigInteger('id_unit');
        $table->unsignedBigInteger('id_kelas');
        $table->string('pendidikan_terakhir');
        $table->string('no_hp');
        $table->date('tgl_masuk_alfityan');
        $table->string('foto_karyawan')->nullable();
        $table->text('pelatihan')->nullable();
        $table->timestamps();

        // $table->foreign('id_jabatan')->references('id')->on('jabatan');
        // $table->foreign('id_unit')->references('id')->on('unit');
        // $table->foreign('id_kelas')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
