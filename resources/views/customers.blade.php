@extends('templates.master')

@section('page_title', 'Customers')
@section('content')
<div class="page-content">
    <!-- Tombol Add Customer -->
    <div class="mb-3">
        <a href="/customers/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Customer
        </a>
    </div>

    <!-- Table Customer List -->
    <div class="card mt-4">
        <div class="card-header">Customer List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $customer->company_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->type }}</td>
                            <td>
                                <span class="badge {{ $customer->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $customer->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="d-flex gap-2 justify-content-center align-items-center">
                                <a href="/customers/edit/{{ $customer->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
