<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\BorrowTransactions;
use App\Mail\BorrowerStatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = Borrower::all();
        return view('borrower.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrower.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:borrowers,email',
            'phone_number' => 'required|string',
            'campus' => 'nullable|string',
            'book_title' => 'nullable|string',
        ]);

        $borrower = Borrower::create($data);

        return response()->json($borrower, 201);
    }

    /**
     * Confirm a borrower and send a confirmation email.
     */
    public function confirm(string $id)
    {
        $borrower = Borrower::find($id);

        if (!$borrower) {
            return response()->json(['error' => 'Borrower not found'], 404);
        }

        // Use book_id if exists, otherwise use null (allow testing without book assignment)
        $book_id = $borrower->book_id;

        $messageText = "Your borrowing request has been confirmed. Please visit the library to pick up your book.";

        try {
            // Send confirmation email
            Mail::to($borrower->email)->send(
                new BorrowerStatusMail($borrower, 'confirmed', $messageText)
            );

            // Create borrow transaction record
            $transaction = BorrowTransactions::create([
                'borrower_id' => $borrower->borrower_id,
                'book_id' => $book_id, // Can be null if no book assigned
                'borrow_date' => Carbon::now()->toDateString(),
                'due_date' => Carbon::now()->addDays(14)->toDateString(), // 14 days borrowing period
                'return_date' => null
            ]);

            return response()->json([
                'status' => 'confirmed',
                'message' => 'Confirmation email sent and transaction created',
                'email' => $borrower->email,
                'name' => $borrower->first_name . ' ' . $borrower->last_name,
                'transaction_id' => $transaction->transaction_id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to send email or create transaction: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reject(string $id)
    {
        $borrower = Borrower::find($id);

        if (!$borrower) {
            return response()->json(['error' => 'Borrower not found'], 404);
        }

        $borrowerEmail = $borrower->email;
        $borrowerName = $borrower->first_name . ' ' . $borrower->last_name;
        $messageText = "Your borrowing request has been rejected.";

        try {
            // Send rejection email first
            Mail::to($borrowerEmail)->send(
                new BorrowerStatusMail($borrower, 'rejected', $messageText)
            );

            // Delete the borrower record from database
            $borrower->delete();

            return response()->json([
                'status' => 'rejected',
                'message' => 'Rejection email sent and borrower record deleted',
                'email' => $borrowerEmail,
                'name' => $borrowerName
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to process rejection: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
