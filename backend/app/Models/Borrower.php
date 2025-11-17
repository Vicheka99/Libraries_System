<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    const TABLE_NAME = 'borrowers';
    const ID = 'borrower_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const PHONE_NUMBER = 'phone_number';
    const CAMPUS = 'campus';
    const BOOK_TITLE = 'book_title';
    const BOOK_ID = 'book_id';

    protected $table = 'borrowers';
    protected $primaryKey = 'borrower_id';
    public $timestamps = true;

    protected $fillable = [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::EMAIL,
        self::PHONE_NUMBER,
        self::CAMPUS,
        self::BOOK_TITLE,
        self::BOOK_ID
    ];

    // Relationship
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'bookID');
    }
}
