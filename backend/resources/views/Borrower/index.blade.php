@extends('master')
@section('content')
<div class="container mt-5
">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2 ">
                        <h2 class="text-center">Borrower Information</h2>
                        <div class="d-flex justify-content-between align-content-center  mb-3">
                        <div class="card-title p-2">
                            <button data-url="" class="btn btn-primary open-modal"
                                data-modal-title="Create Task">+Borrower</button>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">First_Name</th>
                                    <th class="text-truncate">Last_Name</th>
                                    <th class="text-truncate">Date_Of_Birth</th>
                                    <th class="text-truncate">Gender</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Phone Number</th>
                                    <th class="text-truncate">School Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
