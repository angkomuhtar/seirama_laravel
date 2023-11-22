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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->integer('pendidikan');
            $table->string('jenis_usaha');
            $table->string('nama_kt');
            $table->string('jabatan');
            $table->char('propinsi', 17);
            $table->char('kabupaten', 17);
            $table->char('kecamatan', 17);
            $table->char('desa', 17);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
