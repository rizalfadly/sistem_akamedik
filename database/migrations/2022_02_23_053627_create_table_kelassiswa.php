<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKelassiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_siswa', function (Blueprint $table) {
            $table->increments('ks_id');
            $table->integer('siswa')->unsigned();
            $table->integer('kelas')->unsigned();
            $table->timestamps();


            $table->foreign('siswa')->references('id')->on('m_datasiswa')->onDelete('cascade');
            $table->foreign('kelas')->references('kelas_id')->on('m_kelas')->onDelete('restrict');

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
        Schema::table('kelas_siswa', function (Blueprint $table) {
            //
        });
    }
}
