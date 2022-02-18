<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabesMsiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_datasiswa', function (Blueprint $table) {
            $table->integer('status')->unsigned()->after('photo');

            $table->foreign('status')->references('status_id')->on('m_status')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_siswa', function (Blueprint $table) {
        });
    }
}
