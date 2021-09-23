<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_wilayah')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('ketinggian')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jumlah_penduduk')->nullable();
            $table->string('jml_laki_laki')->nullable();
            $table->string('jml_perempuan')->nullable();
            $table->unsignedBigInteger('coordinate_id')->unique();
            $table->timestamps();

            $table->foreign('coordinate_id')->references('id')->on('coordinates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desa');
    }
}
