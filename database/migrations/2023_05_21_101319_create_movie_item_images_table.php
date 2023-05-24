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
        Schema::create('movie_item_images', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('movie_item_id')->nullable()->index();
			$table->string('url')->nullable();
            $table->foreign('movie_item_id')->references('id')->on('movie_items')->nullable()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_item_images');
    }
};
