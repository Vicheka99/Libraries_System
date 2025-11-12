<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('bookID');
            $table->string('title');
            $table->unsignedBigInteger('authorID');
            $table->unsignedBigInteger('categoryID');
            $table->text('description')->nullable();
            $table->integer('stockQTY')->default(0);
            $table->boolean('is_available_for_borrow')->default(true);
            $table->string('read_online_url')->nullable();
            $table->integer('total_views')->default(0);

            // Add book cover fields
            $table->string('front_cover')->nullable();
            $table->string('back_cover')->nullable();

            $table->timestamps();

            // Foreign Keys
            $table->foreign('authorID')
                ->references('authorID')
                ->on('authors')
                ->onDelete('cascade');

            $table->foreign('categoryID')
                ->references('categoryID')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
