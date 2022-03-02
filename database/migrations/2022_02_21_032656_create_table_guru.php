<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_guru', function (Blueprint $table) {
            $table->increments('guru_id');
            $table->string('nama', 115);
            $table->string('tempat_lahir', 115);
            $table->string('tanggal_lahir', 115);
            $table->string('no_hp', 20);
            $table->string('email', 115);
            $table->string('awal_kerja', 115);
            $table->text('photo');
            $table->string('nip', 115);
            $table->timestamps();


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
        Schema::table('m_guru', function (Blueprint $table) {
            //
        });
    }
}
