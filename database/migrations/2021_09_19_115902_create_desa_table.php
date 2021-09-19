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
            $table->string('thn_pembentukan')->nullable();
            $table->string('dsr_hukum_pembentukan')->nullable();
            $table->string('kode_wilayah')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('tipologi')->nullable();
            $table->string('tingkat_perkembangan')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jml_laki_laki')->nullable();
            $table->string('jml_perempuan')->nullable();
            $table->string('mayoritas_pekerjaan')->nullable();
            $table->string('lulusan_tk')->nullable();
            $table->string('lulusan_sd')->nullable();
            $table->string('lulusan_smp')->nullable();
            $table->string('lulusan_sma')->nullable();
            $table->string('lulusan_akademi')->nullable();
            $table->string('lulusan_sarjana')->nullable();
            $table->string('lulusan_pascasarjana')->nullable();
            $table->string('lulusan_ponpes')->nullable();
            $table->string('lulusan_keagamaan')->nullable();
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
