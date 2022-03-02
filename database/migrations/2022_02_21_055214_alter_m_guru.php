<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_guru', function (Blueprint $table) {
            $table->integer('status')->unsigned()->after('nip');

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
        Schema::table('m_guru', function (Blueprint $table) {
            //
        });
    }
}
