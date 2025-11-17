<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #007bff; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .body-content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .footer { background-color: #f0f0f0; padding: 10px; text-align: center; font-size: 12px; color: #666; }
        .status-confirmed { color: #28a745; font-weight: bold; }
        .status-rejected { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Library System - Borrower Status Update</h2>
        </div>
        <div class="body-content">
            <p>Dear <strong>{{ $borrower->first_name }} {{ $borrower->last_name ?? '' }}</strong>,</p>

            <p>{{ $messageText }}</p>

            @if($status === 'confirmed')
                <p>
                    <strong class="status-confirmed">Status: CONFIRMED ✓</strong>
                </p>
                <p>Please visit the library to pick up your borrowed item(s).</p>
            @else
                <p>
                    <strong class="status-rejected">Status: REJECTED ✗</strong>
                </p>
                <p>If you have any questions, please contact the library staff.</p>
            @endif

            <p style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;">
                Best regards,<br>
                <strong>Library Management Team</strong>
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Library System. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
