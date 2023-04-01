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
        Schema::create('textes', function (Blueprint $table) {
            $table->id();
            $table->string('bio');
            $table->string('chat_title');
            $table->string('chat_description');
            $table->string('live_title');
            $table->string('live1_description');
            $table->string('live2_description');
            $table->string('boutique_title');
            $table->string('boutique1_description');
            $table->string('boutique2_description');
            $table->string('abonnee_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textes');
    }
};
