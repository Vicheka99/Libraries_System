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
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">First_Name</th>
                                    <th class="text-truncate">Last_Name</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Phone Number</th>
                                    <th class="text-truncate">Campus</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $index => $user) --}}
                                    <tr>
                                        <td>1</td>
                                        <td>Hong</td>
                                        <td>Gy</td>
                                        <td>hongy@gmail.com</td>
                                        <td>0114552214</td>
                                        <td>RUPP</td>
                                        
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
