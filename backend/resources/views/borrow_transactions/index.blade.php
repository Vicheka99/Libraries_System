@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2">
                        <h2 class="text-center">Borrowing Transaction</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Borrower Name</th>
                                    <th class="text-truncate">Book Title</th>
                                    <th class="text-truncate">Borrow Date</th>
                                    <th class="text-truncate">Due Date</th>
                                    <th class="text-truncate">Return Date</th>
                                    <th class="text-truncate">Borrower Info</th>
                                    <th class="text-truncate">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $index => $transaction)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            @if($transaction->borrower)
                                                <strong>{{ $transaction->borrower->first_name }} {{ $transaction->borrower->last_name }}</strong>
                                            @else
                                                <span class="text-muted">Deleted</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->borrower && $transaction->borrower->book_title)
                                                {{ $transaction->borrower->book_title }}
                                            @elseif($transaction->book)
                                                {{ $transaction->book->title }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->borrow_date }}</td>
                                        <td>{{ $transaction->due_date }}</td>
                                        <td>
                                            @if($transaction->return_date)
                                                <span class="badge bg-success">{{ $transaction->return_date }}</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->borrower)
                                                <small>{{ $transaction->borrower->email }}</small>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$transaction->return_date)
                                                <button class="btn btn-success btn-sm btn-pickup" data-transaction-id="{{ $transaction->transaction_id }}">
                                                    <i class="bi bi-check-circle"></i> Pick Up
                                                </button>
                                            @else
                                                <span class="badge bg-secondary">Completed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    const csrfToken = '{{ csrf_token() }}';

    // Pick Up Button
    $(document).on('click', '.btn-pickup', function(e) {
        e.preventDefault();
        const btn = $(this);
        const transactionId = btn.data('transaction-id');
        const row = btn.closest('tr');
        const borrowerInfo = row.find('td:nth-child(7)').html();
        const borrowerName = row.find('td:nth-child(7) strong').text().trim();
        const url = `/borrow-transactions/${transactionId}/pickup`;

        Swal.fire({
            title: 'Confirm Pick Up',
            html: `Has the borrower picked up their book?<br><br>Borrower: <strong>${borrowerName}</strong>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Picked Up',
            cancelButtonText: 'Not Yet'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Processing...',
                    html: `Updating pick up status for <strong>${borrowerName}</strong>`,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        if (data && data.status === 'picked_up') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Picked Up!',
                                html: `<strong>${data.borrower_name}</strong> has successfully picked up their book.<br><br>Return Date: <strong>${data.return_date}</strong>`,
                                confirmButtonColor: '#28a745',
                                confirmButtonText: 'OK'
                            });

                            // Update the return date badge
                            row.find('td:nth-child(6)').html(`<span class="badge bg-success">${data.return_date}</span>`);

                            // Replace the Pick Up button with Completed badge
                            row.find('td:nth-child(8)').html('<span class="badge bg-secondary">Completed</span>');
                        } else if (data && data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.error,
                                confirmButtonColor: '#dc3545'
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Completed',
                                text: 'Pick up request completed.',
                                confirmButtonColor: '#007bff'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Could not update pick up status. Please try again.',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }
        });
    });
});
</script>
@endsection
