@extends('templates.master')

@section('page_title', 'Users')
@section('content')
<div class="page-content">

    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-person-plus"></i> Add User/Customer
        </button>
    </div>


    <!-- Table User List (contoh statis) -->
    <div class="card mt-4">
        <div class="card-header">User List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td> {{ $user->role }}</td>
                            <td><button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
