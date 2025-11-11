<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $primaryKey = 'genderID';

    protected $fillable = ['gender'];

    public function authors()
    {
        return $this->hasMany(Author::class, 'genderID', 'genderID');
    }
}
