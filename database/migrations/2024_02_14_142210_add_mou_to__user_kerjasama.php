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
        Schema::table('user_kerjasama', function (Blueprint $table) {
            //
            $table->string('no_mou')->default('')->after('surat');
            $table->string('cakupan_kerjasama')->default('')->after('surat');
            $table->string('mou')->default('')->after('surat');
            $table->string('sumber_dana')->default('')->after('surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_kerjasama', function (Blueprint $table) {
            //
            $table->dropColumn('no_mou');
            $table->dropColumn('mou');
            $table->dropColumn('cakupan_kerjasama');
            $table->dropColumn('sumber_dana');

        });
    }
};
