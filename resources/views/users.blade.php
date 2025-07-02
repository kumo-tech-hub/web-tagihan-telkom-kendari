@extends('templates.master')

@section('page_title', 'Users')
@section('content')
<div class="page-content">

    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-person-plus"></i> Add User/Customer
        </button>
    </div>

    <!-- Modal Add User/Customer -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="userName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="userName" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" name="role">
                                <option value="user">Admin</option>
                                <option value="customer">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
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
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    <tr>
                        <td>user1</td>
                        <td>user1@email.com</td>
                        <td>User</td>
                        <td><button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button></td>
                    </tr>
                    <tr>
                        <td>customer1</td>
                        <td>customer1@email.com</td>
                        <td>Customer</td>
                        <td><button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
