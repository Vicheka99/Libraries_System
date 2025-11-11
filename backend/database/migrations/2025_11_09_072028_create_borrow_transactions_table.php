<?php

use App\Models\BorrowTransactions;
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
        Schema::create(BorrowTransactions::TABLE_NAME, function (Blueprint $table) {
            $table->id(BorrowTransactions::ID); // Primary Key
            $table->unsignedBigInteger(BorrowTransactions::BORROWER); // FK from users table
            $table->unsignedBigInteger(BorrowTransactions::BOOK);     // FK from books table
            $table->date(BorrowTransactions::BORROW_DATE);
            $table->date(BorrowTransactions::DUE_DATE);
            $table->date(BorrowTransactions::RETURN_DATE)->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign(BorrowTransactions::BORROWER)->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_transactions');
    }
};
