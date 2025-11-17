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
            $table->id(BorrowTransactions::ID); // transaction_id (PK)
            $table->unsignedBigInteger(BorrowTransactions::BORROWER); // borrower_id (FK)
            $table->unsignedBigInteger(BorrowTransactions::BOOK)->nullable();     // book_id (FK) - nullable
            $table->date(BorrowTransactions::BORROW_DATE);
            $table->date(BorrowTransactions::DUE_DATE);
            $table->date(BorrowTransactions::RETURN_DATE)->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign(BorrowTransactions::BORROWER)
                ->references('borrower_id')
                ->on('borrowers')
                ->onDelete('cascade');

            $table->foreign(BorrowTransactions::BOOK)
                ->references('bookID')
                ->on('books')
                ->onDelete('set null');
        });
    }    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_transactions');
    }
};
