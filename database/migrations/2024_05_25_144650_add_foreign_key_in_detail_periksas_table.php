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
        Schema::table('detail_periksas', function (Blueprint $table) {
            $table->foreign('id_periksa', 'fk_periksa_detail_periksa')->on('periksas')->references('id');
            $table->foreign('id_obat', 'fk_obat_detail_periksa')->on('obats')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_periksas', function (Blueprint $table) {
            $table->dropForeign(['id_periksa']);
            $table->dropForeign(['id_obat']);
        });
    }
};
