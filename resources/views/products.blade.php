@extends('templates.master')

@section('page_title', 'Products')
@section('content')
<div class="page-content">
    <!-- Tombol Add Product -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-circle"></i> Add Product
        </button>
    </div>

    <!-- Modal Add Product -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock Status</label>
                            <select class="form-select" id="productStock" name="stock_status" required>
                                <option value="">-- Select Status --</option>
                                <option value="available">Available</option>
                                <option value="out">Out of Stock</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productDesc" class="form-label">Description</label>
                            <textarea class="form-control" id="productDesc" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Product List (contoh statis) -->
    <div class="card mt-4">
        <div class="card-header">Product List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    <tr>
                        <td>Product 1</td>
                        <td><span class="badge bg-success">Available</span></td>
                        <td>Produk contoh tersedia</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Product 2</td>
                        <td><span class="badge bg-danger">Out of Stock</span></td>
                        <td>Produk contoh habis</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
