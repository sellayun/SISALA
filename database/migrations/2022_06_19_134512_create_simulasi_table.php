<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasi', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('judul');
            $table->text('data_a');
            $table->text('data_b');
            $table->text('data_c');
            $table->text('data_d');
            $table->integer('status');
            $table->string('workdir');
            $table->string('id_simulasi');
            $table->integer('hapus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulasi');
    }
}
