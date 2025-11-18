<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'category']);

        if ($request->has('category') && $request->category != '') {
            $query->where('categoryID', $request->category);
        }

        $books = $query->get()->map(function ($book) {
            return [
                'id' => $book->bookID,
                'title' => $book->title,
                'author' => $book->author->author_name ?? 'Unknown',
                'description' => $book->description ?? '',
                'image' => $book->front_cover ? asset($book->front_cover) : null,
                'front_cover' => $book->front_cover ? asset($book->front_cover) : null,
                'back_cover' => $book->back_cover ? asset($book->back_cover) : null,
                'category' => $book->category->category_type ?? 'Uncategorized',
                'file_path' => $book->file_path ? asset($book->file_path) : null
            ];
        });

        return response()->json($books);
    }

    public function getByCategory($categoryId)
    {
        $books = Book::with(['author', 'category'])
            ->where('categoryID', $categoryId)
            ->get()
            ->map(function ($book) {
                return [
                    'id' => $book->bookID,
                    'title' => $book->title,
                    'author' => $book->author->author_name ?? 'Unknown',
                    'description' => $book->description ?? '',
                    'image' => $book->front_cover ? asset($book->front_cover) : null,
                    'front_cover' => $book->front_cover ? asset($book->front_cover) : null,
                    'back_cover' => $book->back_cover ? asset($book->back_cover) : null,
                    'category' => $book->category->category_type ?? 'Uncategorized',
                    'file_path' => $book->file_path ? asset($book->file_path) : null
                ];
            });

        return response()->json($books);
    }

    public function getByCategoryName($categoryName)
    {
        $books = Book::with(['author', 'category'])
            ->whereHas('category', function ($query) use ($categoryName) {
                $query->where('category_type', $categoryName);
            })
            ->get()
            ->map(function ($book) {
                return [
                    'id' => $book->bookID,
                    'title' => $book->title,
                    'author' => $book->author->author_name ?? 'Unknown',
                    'description' => $book->description ?? '',
                    'image' => $book->front_cover ? asset($book->front_cover) : null,
                    'front_cover' => $book->front_cover ? asset($book->front_cover) : null,
                    'back_cover' => $book->back_cover ? asset($book->back_cover) : null,
                    'category' => $book->category->category_type ?? 'Uncategorized',
                    'file_path' => $book->file_path ? asset($book->file_path) : null
                ];
            });

        return response()->json($books);
    }
}
