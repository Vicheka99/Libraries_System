@extends('master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2 ">
                        <h2 class="text-center">Admin Account Information</h2>
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <a href="#" data-url="{{ route('user.create') }}" data-modal-title="Create User"
                                class="btn btn-primary open-modal">Create User</a> --}}
                            {{-- Search Users --}}
                            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                <form action="{{ route('user.index') }}" method="GET"
                                    class="d-flex align-items-center gap-2">
                                    <input type="text" name="search" placeholder="Search..." class="form-control p-3"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Clear</a>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Profile</th>
                                    <th class="text-truncate">Full Name</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Created At</th>
                                    <th class="text-truncate">Updated At</th>
                                    <th class="text-truncate">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>Emoji: "Jouk Tnam"</td>
                                <td>ស៊ុយ គឹមហុង</td>
                                <td>koemhong168Sava@gmail.com</td>
                                <td>Nv tgai nh kert</td>
                                <td>OT ey ss kjel update</td>
                                <td>Hello world</td>
                                {{-- @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img class="rounded-circle" style="width:70px;"
                                                src="{{ $user->profile ? asset('assets/img/profile/' . $user->profile) : asset('assets/img/avatars/1.png') }}"
                                                alt="">
                                        </td>
                                        <td>{{ $user->fullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <button data-url="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning my-1 open-modal" data-modal-title="Update USER"><i
                                                    class="bi bi-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" id="btn-remove"
                                                data-remove-id="{{ $user->id }}" data-bs-toggle="modal"
                                                data-bs-target="#removeModal"><i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="12">
                                        <div class="d-flex col-12 justify-content-end">
                                            @for ($i = 1; $i <= $total_pages; $i++)
                                                <button id="btn-page" data-page-number="{{ $i }}"
                                                    class="btn btn-primary btn-page p-2 me-2">{{ $i }}</button>
                                            @endfor
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
