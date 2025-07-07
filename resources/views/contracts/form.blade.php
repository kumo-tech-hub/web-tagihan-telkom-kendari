@extends('templates.master')

@section('page_title', isset($contract) ? 'Edit Contract' : 'Add New Contract')

@section('content')
<div class="page-content">
    <div class="mb-4">
        <a href="{{ route('contracts.list') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Contracts
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ isset($contract) ? 'Edit Contract' : 'Add New Contract' }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($contract) ? route('contracts.update', $contract->id) : route('contracts.store') }}" method="POST">
                @csrf
                @if(isset($contract))
                    @method('PUT')
                @endif
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Customer Company <span class="text-danger">*</span></label>
                            <select name="company_id" id="company_id" class="form-select" required 
                                    {{ (isset($selectedCompanyId) && !isset($contract)) ? 'readonly' : '' }}>
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" 
                                        {{ (isset($contract) && $contract->company_id == $company->id) || 
                                           (isset($selectedCompanyId) && $selectedCompanyId == $company->id) || 
                                           (old('company_id') == $company->id) ? 'selected' : '' }}>
                                        {{ $company->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="account_manager_id" class="form-label">Account Manager <span class="text-danger">*</span></label>
                            <select name="account_manager_id" id="account_manager_id" class="form-select" required>
                                <option value="">Select Account Manager</option>
                                @foreach($accountManagers as $manager)
                                    <option value="{{ $manager->id }}" 
                                        {{ (isset($contract) && $contract->account_manager_id == $manager->id) || 
                                           (old('account_manager_id') == $manager->id) ? 'selected' : '' }}>
                                        {{ $manager->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Product <span class="text-danger">*</span></label>
                            <select name="produk_id" id="produk_id" class="form-select" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                        {{ (isset($contract) && $contract->produk_id == $product->id) || 
                                           (old('produk_id') == $product->id) ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="paid_status" class="form-label">Payment Status <span class="text-danger">*</span></label>
                            <select name="paid_status" id="paid_status" class="form-select" required>
                                <option value="">Select Status</option>
                                <option value="Unpaid" 
                                    {{ (isset($contract) && $contract->paid_status == 'Unpaid') || 
                                       (old('paid_status') == 'Unpaid') ? 'selected' : '' }}>
                                    Unpaid
                                </option>
                                <option value="Paid" 
                                    {{ (isset($contract) && $contract->paid_status == 'Paid') || 
                                       (old('paid_status') == 'Paid') ? 'selected' : '' }}>
                                    Paid
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" id="start_date" class="form-control" 
                                   value="{{ isset($contract) ? $contract->start_date->format('Y-m-d') : old('start_date') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" id="end_date" class="form-control" 
                                   value="{{ isset($contract) ? $contract->end_date->format('Y-m-d') : old('end_date') }}" required>
                        </div>
                    </div>
                </div>

                @if(isset($contract))
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> Current Contract Number: <strong>{{ $contract->contract_number }}</strong>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> Contract number will be automatically generated with format: <strong>cont/[random6digits]</strong>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('contracts.list') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> {{ isset($contract) ? 'Update Contract' : 'Save Contract' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(isset($selectedCompanyId) && !isset($contract))
<script>
    // Disable company selection if coming from company page
    document.getElementById('company_id').style.pointerEvents = 'none';
    document.getElementById('company_id').style.backgroundColor = '#e9ecef';
</script>
@endif
@endsection