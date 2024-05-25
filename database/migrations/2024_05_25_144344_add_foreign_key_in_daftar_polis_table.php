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
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->foreign('id_pasien')->on('pasiens')->references('id');
            $table->foreign('id_jadwal')->on('jadwal_periksas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
            $table->dropForeign(['id_jadwal']);
        });
    }
};
