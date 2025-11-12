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
        Schema::create('authors', function (Blueprint $table) {
            $table->id('authorID'); // Primary key
            $table->string('author_name');
            $table->unsignedBigInteger('genderID'); // Foreign key
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('genderID')
                  ->references('genderID')
                  ->on('genders')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
