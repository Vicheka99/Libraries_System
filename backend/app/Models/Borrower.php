<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    const TABLE_NAME = 'borrowers';
    const ID = 'borrower_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const DOB = 'date_of_birth';
    const GENDER = 'gender_id';
    const EMAIL = 'email';
    const PHONE_NUMBER = 'phone_number';
    const SCHOOL_NAME = 'school_name';
    const CREATED_AT = 'created_at';


    protected $fillable = [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::DOB,
        self::EMAIL,
        self::PHONE_NUMBER,
        self::SCHOOL_NAME,
    ];
}
