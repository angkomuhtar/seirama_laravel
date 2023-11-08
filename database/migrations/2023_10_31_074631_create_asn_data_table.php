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
        Schema::create('asn_data', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('npwp');
            $table->integer('jabatan');
            $table->integer('golongan');
            $table->integer('gol_jabatan');
            $table->string('nama_jabatan');
            $table->integer('education');
            $table->string('unit_kerja');
            $table->integer('unit_eselon');
            $table->string('unit_address');
            $table->string('telp');
            $table->integer('propinsi');
            $table->integer('kabupaten');
            $table->integer('profile_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asn_data');
    }
};
