<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const TABLE_NAME = 'users';           // For DB usage like Schema or Eloquent
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender';
    const PROFILE = 'profile';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const USERS = 'users';                // For request form field: <select name="users[]">
    const USERS_DOT_WILDCARD = 'users.*';

}
