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
        Schema::create('daftar_polis', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('id_pasien')->nullable(false);
            $table->string('id_jadwal')->nullable(false);
            $table->text('keluhan')->nullable(false)->default('');
            $table->integer('no_antrian')->nullable(false)->default(0);
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
        Schema::dropIfExists('daftar_polis');
    }
};
