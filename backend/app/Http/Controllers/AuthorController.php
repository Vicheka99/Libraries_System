<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Gender;

class AuthorController extends Controller
{
    // Store new author via AJAX
    public function storeAjax(Request $request)
    {
        $data = $request->validate([
            'author_name' => 'required|string|max:255',
            'genderID' => 'required|exists:genders,genderID',
        ]);

        $author = Author::create($data);

        return response()->json([
            'authorID' => $author->authorID,
            'author_name' => $author->author_name,
            'gender' => $author->gender->gender_type,
            'message' => 'Author added successfully!',
        ]);
    }

    // Get list of genders for AJAX
    public function genders()
    {
        // simple JSON list for the modal select
        $genders = Gender::select('genderID', 'gender')->get();
        return response()->json($genders);
    }

    // Show form to create a new author
    public function create()
    {
        $genders = Gender::all(); // get all genders for dropdown
        return view('authors.create', compact('genders'));
    }

    // Store a new author in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'author_name' => 'required|string|max:255',
            'genderID' => 'required|exists:genders,genderID', // ensure valid gender
        ]);

        // Store in database
        Author::create($request->all());

        // Redirect with success message
        return redirect()->back()->with('success', 'Author added successfully!');
    }

    // Search authors for Select2 AJAX
    public function search(Request $request)
    {
        $search = $request->q; // search query from Select2

        $authors = Author::where('author_name', 'LIKE', "%{$search}%")
                        ->limit(20)
                        ->get();

        $results = $authors->map(function($author) {
            return [
                'id' => $author->authorID,
                'text' => $author->author_name
            ];
        });

        return response()->json(['results' => $results]);
    }

}
