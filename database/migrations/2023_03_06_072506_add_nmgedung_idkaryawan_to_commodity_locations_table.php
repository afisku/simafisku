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
        Schema::table('commodity_locations', function (Blueprint $table) {
            $table->string('nmgedung')->nullable();
            $table->string('kdr')->nullable();
            $table->foreignId('idkaryawan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodity_locations', function (Blueprint $table) {
            $table->dropColumn('nmgedung');
            $table->dropColumn('kdr');
            $table->dropColumn('idkaryawan');
        });
    }
};
