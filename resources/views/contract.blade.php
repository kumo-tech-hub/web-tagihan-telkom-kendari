@extends('templates.master')

@section('page_title', 'Contracts')

@section('content')
<div class="page-content">


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">Contract List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Contract Number</th>
                        <th>Customer</th>
                        <th>Account Manager</th>
                        <th>Product</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contracts as $index => $contract)
                        <tr>
                            <td>{{ $index + $contracts->firstItem() }}</td>
                            <td>
                                {{ $contract->contract_number }}
                            </td>
                            <td>{{ $contract->company->company_name ?? '-' }}</td>
                            <td>{{ $contract->accountManager->name ?? '-' }}</td>
                            <td>{{ $contract->produk->name ?? '-' }}</td>
                            <td>{{ $contract->start_date->format('d M Y') }}</td>
                            <td>{{ $contract->end_date->format('d M Y') }}</td>
                            <td>
                                @if($contract->paid_status == 'Paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unpaid</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this contract?');">
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
                            <td colspan="9" class="text-center">No contracts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $contracts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection