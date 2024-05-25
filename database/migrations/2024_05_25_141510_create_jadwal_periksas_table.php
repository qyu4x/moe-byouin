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
        Schema::create('jadwal_periksas', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('id_dokter')->nullable(false);
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'])->nullable(false);
            $table->time('jadwal_mulai')->nullable(false)->default('00:00:00');
            $table->time('jadwal_selesai')->nullable(false)->default('00:00:00');
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
        Schema::dropIfExists('jadwal_periksas');
    }
};
