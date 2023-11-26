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
        Schema::create('user_kerjasama', function (Blueprint $table) {
            $table->id();
            $table->string('instansi');
            $table->integer('kerjasama_id');
            $table->string('nm_kegiatan');
            $table->string('lokasi');
            $table->date('start');
            $table->date('end');
            $table->string('cp');
            $table->string('surat');
            $table->enum('status',['wait', 'accept', 'reject']);
            $table->integer('id_kegiatan')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kerjasama');
    }
};
