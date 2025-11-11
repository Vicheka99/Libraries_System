<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const TABLE_NAME = 'users';           // For DB usage like Schema or Eloquent
    const ID = 'id';
    const NAME = 'name';
    const GENDER = 'gender';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const USERS_DOT_WILDCARD = 'users.*'; // For validation

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::GENDER,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
