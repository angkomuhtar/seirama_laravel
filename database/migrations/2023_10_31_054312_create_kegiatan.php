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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->integer("kerjasama_id");
            $table->string("pelaksana")->nullable();
            $table->date("start");
            $table->date("end");
            $table->string("tempat")->nullable();
            $table->string("pengajar")->nullable();
            $table->string("instansi")->nullable();
            $table->string("sarana")->nullable();
            $table->integer("peserta")->nullable();
            $table->set("jenis_peserta", ['aparatur','non-aparatur'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
