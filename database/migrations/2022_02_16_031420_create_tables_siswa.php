<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_datasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis', 15);
            $table->string('nama', 115);
            $table->string('no_hp', 20);
            $table->string('email', 100);
            $table->text('alamat');
            $table->text('photo');
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
        Schema::table('M_datasiswa', function (Blueprint $table) {
        });
    }
}
