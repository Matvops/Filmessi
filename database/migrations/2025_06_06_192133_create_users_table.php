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
        Schema::create('users', function (Blueprint $table) {
            $table->id("user_id")->autoIncrement();
            $table->string("username", 30);
            $table->string("email", 50)->unique();
            $table->string("password", 100);
            $table->enum("role", ["ADMIN", "USER"]);
            $table->boolean("accept_term");
            $table->timestamp("email_verified_at")->nullable();
            $table->boolean("active");
            $table->string("token", 150)->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
