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
        Schema::create('short_story_collections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('price');
            $table->foreignId('author_id')->constrained();
            $table->string('theme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_story_collections');
    }
};
