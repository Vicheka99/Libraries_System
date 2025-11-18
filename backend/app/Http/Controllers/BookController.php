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
    public function index(Request $request)
    {
        $categoryID = $request->category;
        $search = $request->search;

        $query = Book::with(['author', 'category']);

        // -----------------------------
        // ✔ Filter by category
        // -----------------------------
        if (!empty($categoryID)) {
            $query->where('categoryID', $categoryID);
        }

        // -----------------------------
        // ✔ Search by title or author
        // -----------------------------
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                ->orWhereHas('author', function($a) use ($search) {
                    $a->where('author_name', 'like', "%$search%");
                });
            });
        }

        $books = $query->get();
        $categories = Category::all();

        return view('books.index', compact('books', 'categories', 'categoryID', 'search'));
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
            'front_cover_path' => 'nullable|string',
            'back_cover_path' => 'nullable|string',
            'file_path' => 'nullable|mimetypes:application/pdf|max:204800',
        ]);

        $category = \App\Models\Category::find($data['categoryID']);
        $categoryFolderName = strtolower(str_replace([' ', '&'], ['_', 'and'], $category->category_type));
        $categoryFolder = public_path("assets/books/" . $categoryFolderName);
        if (!file_exists($categoryFolder)) mkdir($categoryFolder, 0777, true);

        // Move front cover
        if (!empty($data['front_cover_path'])) {
            $temp = public_path($data['front_cover_path']);
            $newPath = "assets/books/$categoryFolderName/" . basename($temp);
            if (file_exists($temp)) \Illuminate\Support\Facades\File::move($temp, public_path($newPath));
            $data['front_cover'] = $newPath;
        }

        // Move back cover
        if (!empty($data['back_cover_path'])) {
            $temp = public_path($data['back_cover_path']);
            $newPath = "assets/books/$categoryFolderName/" . basename($temp);
            if (file_exists($temp)) \Illuminate\Support\Facades\File::move($temp, public_path($newPath));
            $data['back_cover'] = $newPath;
        }

        // Save PDF
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . "_" . \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . "." . $file->getClientOriginalExtension();
            $pdfFolder = public_path("assets/books/pdf");
            if (!file_exists($pdfFolder)) mkdir($pdfFolder, 0777, true);
            $file->move($pdfFolder, $filename);
            $data['file_path'] = "assets/books/pdf/" . $filename;
        }

        $book = \App\Models\Book::create($data);

        // Clean temporary folder
        $tempFolder = public_path("assets/books/temporary");
        if (\Illuminate\Support\Facades\File::exists($tempFolder)) {
            \Illuminate\Support\Facades\File::deleteDirectory($tempFolder);
        }

        return response()->json(['success' => true, 'message' => 'Book added successfully!', 'book' => $book]);
    }


    // 5 SHOW - show one specific book detail
    public function show($id) {
        $book = Book::with(['author', 'category'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // 6 EDIT - show form for editing an existing book
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', compact('book','authors','categories'));
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
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Book deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete book: ' . $e->getMessage()
            ], 500);
        }
    }
    // 9 Get list of categories for AJAX
    public function categories()
    {
        $categories = \App\Models\Category::select('categoryID', 'category_type')->get();

        return response()->json($categories);
    }

    // 10 Read PDF inline (open in browser, not download)
    public function readPdf($id)
    {
        $book = Book::findOrFail($id);

        if (!$book->file_path || !file_exists(public_path($book->file_path))) {
            abort(404, 'PDF not found');
        }

        $file = public_path($book->file_path);

        return response()->file($file, [
            'Content-Type' => 'application/pdf',
        ]);
    }

}

