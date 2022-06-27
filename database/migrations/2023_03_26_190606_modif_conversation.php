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
        Schema::dropIfExists('membre_conversations');
        Schema::dropIfExists('messages');
        
        Schema::create('membre_conversations', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->string('message');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_conversations');
        Schema::dropIfExists('messages');

        Schema::create('membre_conversations', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->integer('membrable_id');
            $table->string('membrable_type');
            $table->timestamps();
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->string('message');
            $table->integer('messagable_id');
            $table->string('messagable_type');
            $table->timestamps();
        });
    }
};
