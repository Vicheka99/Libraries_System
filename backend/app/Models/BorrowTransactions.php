<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowTransactions extends Model
{
    // $table->id('transaction_id'); // Primary Key
    //         $table->unsignedBigInteger('borrower_id'); // FK from users table
    //         $table->unsignedBigInteger('book_id');     // FK from books table
    //         $table->date('borrow_date');
    //         $table->date('due_date');
    //         $table->date('return_date')->nullable();
    //         $table->timestamps();

    const TABLE_NAME = 'borrow_transactions';
    const ID = 'transaction_id';
    const BORROWER = 'borrower_id';
    const BOOK = 'book_id';
    const BORROW_DATE = 'borrow_date';
    const DUE_DATE = 'due_date';
    const RETURN_DATE = 'return_date';

    protected $fillable = [
        self::BORROWER,
        self::BOOK,
        self::BORROW_DATE,
        self::DUE_DATE,
        self::RETURN_DATE,
    ];
}
