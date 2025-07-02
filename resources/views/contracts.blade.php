@extends('templates.master')

@section('page_title', 'Contracts')
@section('content')
<div class="page-content">
    <!-- Form Data Company & Manager -->
    <div class="card mb-4">
        <div class="card-header">Add Company Data</div>
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="managerName" class="form-label">Manager</label>
                        <input type="text" class="form-control" id="managerName" name="manager_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addContactPersonModal">
                        <i class="bi bi-person-plus"></i> Add Contact Person
                    </button>
                </div>
                <button type="submit" class="btn btn-primary">Save Company</button>
            </form>
        </div>
    </div>

    <!-- Modal Add Contact Person -->
    <div class="modal fade" id="addContactPersonModal" tabindex="-1" aria-labelledby="addContactPersonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContactPersonModalLabel">Add Contact Person</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="contactPersonName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="contactPersonName" name="contact_person_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPersonPhone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="contactPersonPhone" name="contact_person_phone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Contact Person</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Example Table Data Contracts (with Action) -->
    <div class="card mt-4">
        <div class="card-header">Company List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Manager</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    <tr>
                        <td>PT. Contoh</td>
                        <td>Manager A</td>
                        <td>John Doe (08123456789)</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addContractModal"><i class="bi bi-file-earmark-plus"></i> Add Contract</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Contract -->
    <div class="modal fade" id="addContractModal" tabindex="-1" aria-labelledby="addContractModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContractModalLabel">Add Contract</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="contractProduct" class="form-label">Product</label>
                            <select class="form-select" id="contractProduct" name="product">
                                <option value="">-- Select Product --</option>
                                <!-- Loop produk dari backend -->
                                <option value="1">Product 1</option>
                                <option value="2">Product 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contractDesc" class="form-label">Description</label>
                            <textarea class="form-control" id="contractDesc" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Contract</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
