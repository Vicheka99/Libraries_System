<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowTransactions extends Model
{
    const TABLE_NAME = 'borrow_transactions';
    const ID = 'transaction_id';
    const BORROWER = 'borrower_id';
    const BOOK = 'book_id';
    const BORROW_DATE = 'borrow_date';
    const DUE_DATE = 'due_date';
    const RETURN_DATE = 'return_date';

    protected $table = 'borrow_transactions';
    protected $primaryKey = 'transaction_id';
    public $timestamps = true;

    protected $fillable = [
        self::BORROWER,
        self::BOOK,
        self::BORROW_DATE,
        self::DUE_DATE,
        self::RETURN_DATE,
    ];

    // Relationships
    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id', 'borrower_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'bookID');
    }
}
