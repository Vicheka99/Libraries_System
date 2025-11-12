<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'authorID'; // because your PK is not 'id'

    protected $fillable = [
        'author_name',
        'genderID',
    ];

    /**
     * Define the relationship to Gender.
     */
    public function gender()
    {
        // belongsTo(RelatedModel, foreign_key_in_this_table, owner_key_in_related_table)
        return $this->belongsTo(Gender::class, 'genderID', 'genderID');
    }
    public function books() {
        return $this->hasMany(Book::class, 'authorID', 'authorID');
    }
}
