@extends('templates.master')

@section('page_title', 'Managers')
@section('content')
<div class="page-content">
    <!-- Tombol Add Account Manager -->
    <div class="mb-3">
        <a href="/managers/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Account Manager
        </a>
    </div>

    <!-- Table Account Manager List -->
    <div class="card mt-4">
        <div class="card-header">Account Manager List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($managers as $manager)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $manager->first_name }} {{ $manager->last_name }}</td>
                            <td>{{ $manager->email }}</td>
                            <td>{{ $manager->phone_number }}</td>
                            <td>
                                <span class="badge {{ $manager->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $manager->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="d-flex gap-2 justify-content-center align-items-center">
                                <a href="/managers/edit/{{ $manager->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="/managers/delete/{{ $manager->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this manager?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="mt-3">
                {{ $managers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
