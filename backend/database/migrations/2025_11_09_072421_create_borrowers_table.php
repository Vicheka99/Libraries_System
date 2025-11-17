<?php

use App\Models\Borrower;
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
        Schema::create(Borrower::TABLE_NAME, function (Blueprint $table) {
            $table->id(Borrower::ID); // Primary Key
            $table->string(Borrower::FIRST_NAME);
            $table->string(Borrower::LAST_NAME);
            $table->string(Borrower::EMAIL)->unique();
            $table->string(Borrower::PHONE_NUMBER);
            $table->string(Borrower::CAMPUS)->nullable();
            $table->string(Borrower::BOOK_TITLE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
