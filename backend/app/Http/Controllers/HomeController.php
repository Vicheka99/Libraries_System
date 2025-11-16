<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    /**
     * Upload book cover (front or back) to /public/assets/books/temporary
     */
    public function uploadFile(Request $request)
    {
        $fileKey = array_key_first($request->allFiles());

        if (!$fileKey) return response()->json(['error' => 'No file uploaded'], 400);

        $request->validate([
            $fileKey => "required|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        $file = $request->file($fileKey);
        $filename = time() . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . $file->getClientOriginalExtension();

        $tempFolder = public_path("assets/books/temporary");
        if (!file_exists($tempFolder)) mkdir($tempFolder, 0777, true);

        $file->move($tempFolder, $filename);

        return "assets/books/temporary/" . $filename;
    }

    public function clearTempFolder()
    {
        $tempFolder = public_path("assets/books/temporary");
        if (file_exists($tempFolder)) {
            \Illuminate\Support\Facades\File::deleteDirectory($tempFolder);
        }
        return response()->json(['success' => true]);
    }


}
