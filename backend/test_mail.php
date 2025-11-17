<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

// Test mail
use Illuminate\Support\Facades\Mail;
use App\Models\Borrower;
use App\Mail\BorrowerStatusMail;

$borrower = Borrower::first();

if ($borrower) {
    echo "Testing email to: {$borrower->email}\n";
    try {
        Mail::to($borrower->email)->send(new BorrowerStatusMail($borrower, 'confirmed', 'Test message'));
        echo "✓ Email sent successfully!\n";
    } catch (\Exception $e) {
        echo "✗ Error: " . $e->getMessage() . "\n";
        echo "Details: " . $e->getTraceAsString() . "\n";
    }
} else {
    echo "No borrower found in database\n";
}
