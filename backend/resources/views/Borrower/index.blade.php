@extends('master')
@section('content')
    <div class="container mt-5
">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2 ">
                        <h2 class="text-center">Borrower Information</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">First_Name</th>
                                    <th class="text-truncate">Last_Name</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Phone Number</th>
                                    <th class="text-truncate">Campus</th>
                                    <th class="text-truncate">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($borrowers as $index => $borrower)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{ $borrower -> first_name}}</td>
                                        <td>{{ $borrower -> last_name}}</td>
                                        <td>{{ $borrower -> email}}</td>
                                        <td>{{ $borrower -> phone_number}}</td>
                                        <td>{{ $borrower-> campus }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-confirm" data-id="{{ $borrower->borrower_id }}">Confirm</button>
                                            <button class="btn btn-danger btn-reject" data-id="{{ $borrower->borrower_id }}">Reject</button>
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

    // Confirm Button
    $(document).on('click', '.btn-confirm', function(e) {
        e.preventDefault();
        const btn = $(this);
        const id = btn.data('id');
        const row = btn.closest('tr');
        const borrowerName = row.find('td:nth-child(2)').text().trim();
        const email = row.find('td:nth-child(5)').text().trim();
        const url = `/borrower/${id}/confirm`;

        // Show loading state
        Swal.fire({
            title: 'Processing...',
            html: `Sending confirmation email to <strong>${email}</strong>`,
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
                if (data && data.status === 'confirmed') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Confirmed!',
                        html: `Confirmation email has been sent to:<br><strong>${data.email}</strong><br><br>Borrower: <strong>${data.name}</strong><br><br>Record moved to Borrow Transactions.`,
                        confirmButtonColor: '#28a745',
                        confirmButtonText: 'OK'
                    });

                    // Remove the row from Borrower table (moved to transactions)
                    row.fadeOut(400, function() {
                        $(this).remove();

                        // Reindex the row numbers
                        $('table tbody tr').each(function(index) {
                            $(this).find('td:first').text(index + 1);
                        });
                    });
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
                        text: 'Confirmation request completed.',
                        confirmButtonColor: '#007bff'
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr);
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'Could not send confirmation email. Please try again.',
                    confirmButtonColor: '#dc3545'
                });
            }
        });
    });

    // Reject Button
    $(document).on('click', '.btn-reject', function(e) {
        e.preventDefault();
        const btn = $(this);
        const id = btn.data('id');
        const row = btn.closest('tr');
        const borrowerName = row.find('td:nth-child(2)').text().trim();
        const email = row.find('td:nth-child(5)').text().trim();
        const url = `/borrower/${id}/reject`;

        // Show confirmation dialog first
        Swal.fire({
            title: 'Are you sure?',
            html: `Do you want to reject the borrowing request from:<br><strong>${borrowerName}</strong>?<br><br>An email will be sent to: <strong>${email}</strong><br><br><strong style="color: #dc3545;">This will permanently delete the borrower record!</strong>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, reject and delete!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Processing...',
                    html: `Sending rejection email to <strong>${email}</strong><br>and deleting record...`,
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
                        if (data && data.status === 'rejected') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Rejected!',
                                html: `Rejection email has been sent to:<br><strong>${data.email}</strong><br><br>Borrower: <strong>${data.name}</strong><br><br>The record has been deleted from the database.`,
                                confirmButtonColor: '#dc3545',
                                confirmButtonText: 'OK'
                            });

                            // Remove the entire row from the table with animation
                            row.fadeOut(400, function() {
                                $(this).remove();

                                // Reindex the row numbers
                                $('table tbody tr').each(function(index) {
                                    $(this).find('td:first').text(index + 1);
                                });
                            });
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
                                text: 'Rejection request completed.',
                                confirmButtonColor: '#007bff'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Could not send rejection email. Please try again.',
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
