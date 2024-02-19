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
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->string('no_mou')->default('')->nullable()->after('type_peserta');
            $table->string('cakupan_kerjasama')->default('')->nullable()->after('type_peserta');
            $table->string('mou')->default('')->nullable()->after('type_peserta');
            $table->string('sumber_dana')->default('')->nullable()->after('type_peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            //
            $table->dropColumn('no_mou');
            $table->dropColumn('mou');
            $table->dropColumn('cakupan_kerjasama');
            $table->dropColumn('sumber_dana');
        });
    }
};
