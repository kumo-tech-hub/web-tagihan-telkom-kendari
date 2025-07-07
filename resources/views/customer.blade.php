@extends('templates.master')

@section('page_title', 'Companies') {{-- Judul halaman bisa diubah jika perlu --}}

@section('content')
<div class="page-content">
    <div class="mb-4">
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Company
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">Company List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        {{-- PERUBAHAN DI SINI: Kolom header diubah --}}
                        <th>Company</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)
                        <tr>
                            {{-- PERUBAHAN DI SINI: Kolom data disesuaikan dengan header --}}
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->contact_person_name }} ({{ $company->contact_person_phone }})</td>

                            <td class="d-flex gap-2">
                                <a href="{{ route('customer.edit', $company->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addCustomerModal-{{$company->id}}">
                                    <i class="bi bi-file-earmark-plus"></i> Add Contract
                                </button>

                                <form action="{{ route('customer.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            {{-- PERUBAHAN DI SINI: colspan disesuaikan menjadi 5 --}}
                            <td colspan="5" class="text-center">No companies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>

@foreach ($companies as $company)
<div class="modal fade" id="addCustomerModal-{{$company->id}}" tabindex="-1" aria-labelledby="addCustomerModalLabel-{{$company->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel-{{$company->id}}">Add Contract for {{ $company->company_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store_customer') }}" method="POST">
                    @csrf
                    {{-- Kirim company_id secara tersembunyi --}}
                    <input type="hidden" name="company_id" value="{{ $company->id }}">

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" value="{{ $company->company_name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="start_date-{{$company->id}}" class="form-label">Start Date</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date-{{$company->id}}" name="start_date" required>
                        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date-{{$company->id}}" class="form-label">End Date</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date-{{$company->id}}" name="end_date" required>
                        @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="account_manager_id-{{$company->id}}" class="form-label">Account Manager</label>
                        <select class="form-select @error('account_manager_id') is-invalid @enderror" name="account_manager_id" id="account_manager_id-{{$company->id}}" required>
                            <option value="">-- Select Manager --</option>
                            {{-- Loop untuk mengisi dropdown manager --}}
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                        </select>
                        @error('account_manager_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="produk_id-{{$company->id}}" class="form-label">Product</label>
                        <select class="form-select @error('produk_id') is-invalid @enderror" name="produk_id" id="produk_id-{{$company->id}}" required>
                            <option value="">-- Select Product --</option>
                             {{-- Loop untuk mengisi dropdown produk --}}
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('produk_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="paid_status-{{$company->id}}" class="form-label">Paid Status</label>
                        <select class="form-select @error('paid_status') is-invalid @enderror" name="paid_status" id="paid_status-{{$company->id}}" required>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                        </select>
                        @error('paid_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Contract</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection