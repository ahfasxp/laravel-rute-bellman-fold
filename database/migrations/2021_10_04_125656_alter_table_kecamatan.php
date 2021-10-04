<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->string('kabupaten')->nullable()->after('nama');
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('ketinggian')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jumlah_penduduk')->nullable();
            $table->string('jml_laki_laki')->nullable();
            $table->string('jml_perempuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            //
        });
    }
}
