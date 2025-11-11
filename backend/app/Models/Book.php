<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'bookID';

    protected $fillable = [
    'title',
    'authorID',
    'categoryID',
    'description',
    'stockQTY',
    'is_available_for_borrow',
    'file_path',
    'total_views',
    'front_cover',
    'back_cover',
];

    // Relationships
    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'authorID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID', 'categoryID');
    }
}
