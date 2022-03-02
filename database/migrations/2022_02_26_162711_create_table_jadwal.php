<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jadwalpelajaran', function (Blueprint $table) {
            $table->increments('jadwal_id');
            $table->integer('hari')->unsigned();
            $table->integer('kelas')->unsigned();
            $table->integer('mapel')->unsigned();
            $table->datetime('jam_dari');
            $table->datetime('jam_sampai');
            $table->timestamps();


            $table->foreign('hari')->references('hari_id')->on('m_hari')->onDelete('restrict');
            $table->foreign('kelas')->references('kelas_id')->on('m_kelas')->onDelete('cascade');
            $table->foreign('mapel')->references('mapel_id')->on('m_mapel')->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_jadwalpelajaran', function (Blueprint $table) {
            //
        });
    }
}
