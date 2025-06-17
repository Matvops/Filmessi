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
        Schema::create('films', function (Blueprint $table) {
            $table->id('film_id')->autoIncrement();
            $table->foreignId('film_category_id')
                    ->references('category_id')
                    ->on('categories');
            $table->string('title')->unique();
            $table->text('description');
            $table->smallInteger('year');
            $table->boolean('translated');
            $table->boolean('active');
            $table->integer('views');
            $table->text('link');
            $table->string('image_path');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
