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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->text('description')->nullable();
			$table->text('short_description')->nullable();
			$table->unsignedBigInteger('genre_id')->nullable()->index();
			$table->unsignedBigInteger('country_id')->nullable()->index();
			$table->integer('imdb')->default(0);
			$table->integer('privilege')->default(0);
			$table->string('icon')->nullable();
			$table->integer('is_serial')->default(0);
			$table->integer('season')->default(1);
			$table->string('banner')->nullable();
            $table->timestamps();


			$table->foreign('genre_id')->references('id')->on('genres')->nullable()->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('country_id')->references('id')->on('countries')->nullable()->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
