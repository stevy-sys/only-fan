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
        Schema::table('textes', function (Blueprint $table) {
            $table->string('storie_title');
            $table->string('gallerie_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('textes', function (Blueprint $table) {
            $table->dropColumn('storie_title');
            $table->dropColumn('gallerie_title');
        });
    }
};
