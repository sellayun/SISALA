<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->text('foto');
            $table->string('nama');
            $table->string('email');
            $table->string('nim');
            $table->string('phone');
            $table->string('password');
            $table->enum('difficulty', ['Admin', 'Mahasiswa']);
            $table->boolean('status');
            $table->boolean('verif');
            $table->dateTime('tanggal', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
