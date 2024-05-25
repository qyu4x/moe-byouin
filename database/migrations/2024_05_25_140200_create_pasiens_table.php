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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('nama')->nullable(false);
            $table->string('alamat')->nullable(false);
            $table->string('no_ktp')->nullable(false);
            $table->string('no_hp', 50)->nullable(false);
            $table->string('no_rm', 25)->nullable(false);
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
        Schema::dropIfExists('pasiens');
    }
};
