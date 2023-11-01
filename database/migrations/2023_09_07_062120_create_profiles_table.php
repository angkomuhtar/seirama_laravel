<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ktp');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('telp');
            $table->enum('jenkel', ['M', 'F']);
            $table->integer('status_pernikahan');
            $table->integer('agama');
            $table->integer('user_id');
            $table->enum('isASN',['Y', 'N'])->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
