<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class BookController extends Controller
{
    // 1 INDEX - show all books
    public function index()
    {
        // Get all books with their category & author (relationship)
        $books = Book::with(['author', 'category'])->get();

        return view('books.index', compact('books'));
    }

    // 2 SEARCH - find books by title or author
    public function search(Request $request)
    {
        $search = $request->input('query');

        $books = Book::with(['author', 'category'])
            ->where('title', 'like', "%{$search}%")
            ->orWhereHas('author', function($q) use ($search) {
                $q->where('author_name', 'like', "%{$search}%");
            })
            ->get();

        return view('books.index', compact('books'));
    }

    // 3 CREATE - show form for adding book
    public function create()
    {
        // Get all authors and categories for dropdowns
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }

    // 4 STORE - save a new book
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'authorID' => 'required|exists:authors,authorID',
            'categoryID' => 'required|exists:categories,categoryID',
            'description' => 'nullable|string',
            'stockQTY' => 'required|integer|min:0',
            'is_available_for_borrow' => 'nullable|boolean',
            'file_path' => 'nullable|mimes:pdf|max:10240',
            'front_cover' => 'nullable|string',
            'back_cover' => 'nullable|string',
        ]);

        // ✅ Get category folder (underscore-based)
        $category = Category::find($data['categoryID']);
        $categoryFolderName = strtolower(str_replace([' ', '&'], ['_', 'and'], $category->category_type));
        $categoryFolder = public_path('assets/books/' . $categoryFolderName);

        // ✅ Create folder if not exists
        if (!file_exists($categoryFolder)) {
            mkdir($categoryFolder, 0777, true);
        }

        // 🟢 Move front cover
        if (!empty($data['front_cover']) && file_exists(public_path($data['front_cover']))) {
            $newPath = 'assets/books/' . $categoryFolderName . '/' . basename($data['front_cover']);
            File::move(public_path($data['front_cover']), public_path($newPath));
            $data['front_cover'] = $newPath;
        }

        // 🟢 Move back cover
        if (!empty($data['back_cover']) && file_exists(public_path($data['back_cover']))) {
            $newPath = 'assets/books/' . $categoryFolderName . '/' . basename($data['back_cover']);
            File::move(public_path($data['back_cover']), public_path($newPath));
            $data['back_cover'] = $newPath;
        }

        // 🟢 Handle PDF upload
        if ($request->hasFile('file_path')) {
            $pdfFolder = 'assets/books/pdf/';
            if (!file_exists(public_path($pdfFolder))) {
                mkdir(public_path($pdfFolder), 0777, true);
            }
            $fileName = time() . '_' . $request->file('file_path')->getClientOriginalName();
            $request->file('file_path')->move(public_path($pdfFolder), $fileName);
            $data['file_path'] = $pdfFolder . $fileName;
        }

        // 🟢 Save book data
        $book = Book::create($data);

        // 🧹 Clean up leftover temp files (if still exist)
        if (!empty($data['front_cover']) && str_contains($data['front_cover'], 'temp'))
            File::delete(public_path($data['front_cover']));
        if (!empty($data['back_cover']) && str_contains($data['back_cover'], 'temp'))
            File::delete(public_path($data['back_cover']));

        return response()->json([
            'success' => true,
            'message' => 'Book added successfully!',
            'book' => $book,
        ]);
    }

    // 5 SHOW - show one specific book detail
    public function show($id)
    {
        $book = Book::with(['author', 'category'])->findOrFail($id);

        return view('books.show', compact('book'));
    }

    // 6 EDIT - show form for editing an existing book
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    // 7 UPDATE - save edited book data
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'authorID' => 'required|exists:authors,authorID',
            'categoryID' => 'required|exists:categories,categoryID',
            'description' => 'nullable|string',
        ]);

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    // 8 DESTROY - delete a book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted!');
    }
    // 9 Get list of categories for AJAX
    public function categories()
    {
        $categories = \App\Models\Category::select('categoryID', 'category_type')->get();

        return response()->json($categories);
    }

    // 10 Upload book image to temp folder via AJAX
    public function uploadTemp(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate unique file name
        $filename = Str::random(10) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();

        // Define public path for temp folder
        $tempPath = public_path('assets/books/temp');

        // Create temp folder if not exist
        if (!file_exists($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        // Move uploaded file to public/assets/books/temp
        $request->file('image')->move($tempPath, $filename);

        return response()->json([
            'success' => true,
            'path' => 'assets/books/temp/' . $filename, // relative path
            'url' => asset('assets/books/temp/' . $filename), // full URL for preview
        ]);
    }
}
