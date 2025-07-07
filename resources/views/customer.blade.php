@extends('templates.master')

@section('page_title', 'Companies')

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
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->contact_person_name }} ({{ $company->contact_person_phone }})</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('customer.edit', $company->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                
                                <a href="{{ route('contracts.create', ['company_id' => $company->id]) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-file-earmark-plus"></i> Add Contract
                                </a>

                                <form action="{{ route('customer.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
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
@endsection