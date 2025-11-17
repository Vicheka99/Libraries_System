<?php

namespace App\Http\Controllers;

use App\Models\BorrowTransactions;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowTransactionController extends Controller
{
    /**
     * Display a listing of borrow transactions.
     */
    public function index()
    {
        $transactions = BorrowTransactions::with(['borrower', 'book'])
            ->orderByRaw('CASE WHEN return_date IS NULL THEN 0 ELSE 1 END')
            ->orderBy('borrow_date', 'desc')
            ->get();

        return view('borrow_transactions.index', compact('transactions'));
    }

    /**
     * Update return date when book is picked up.
     */
    public function pickUp(string $id)
    {
        $transaction = BorrowTransactions::find($id);

        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        try {
            $transaction->return_date = Carbon::now()->toDateString();
            $transaction->save();

            // Get borrower name
            $borrowerName = 'Unknown';
            if ($transaction->borrower) {
                $borrowerName = $transaction->borrower->first_name . ' ' . $transaction->borrower->last_name;
            }

            return response()->json([
                'status' => 'picked_up',
                'message' => 'Book has been picked up',
                'return_date' => $transaction->return_date,
                'borrower_name' => $borrowerName
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update transaction: ' . $e->getMessage()
            ], 500);
        }
    }
}
