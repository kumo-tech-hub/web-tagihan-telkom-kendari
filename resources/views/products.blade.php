@extends('templates.master')

@section('page_title', 'Products')
@section('content')
<div class="page-content">
    <!-- Tombol Add Product -->
    <div class="mb-3">
        <a href="/products/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Product
        </a>
    </div>

    <div class="card mt-4">
        <div class="card-header">Product List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <span class="badge {{ $product->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->status ? 'Available' : 'Out of Stock' }}
                                </span>
                            </td>
                            <td class="d-flex gap-2 justify-content-center align-items-center">
                                <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="/products/delete/{{ $product->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
