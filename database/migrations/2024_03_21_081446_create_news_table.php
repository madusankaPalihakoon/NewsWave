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
        Schema::create('news', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('source')->nullable();
            $table->string('name')->nullable();
            $table->string('author')->nullable();
            $table->longText('title')->unique();
            $table->longText('description')->nullable()->default('No Description');
            $table->longText('url')->nullable();
            $table->longText('urlToImage')->nullable();
            $table->string('publishedAt');
            $table->longText('content')->nullable()->default('No Content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
