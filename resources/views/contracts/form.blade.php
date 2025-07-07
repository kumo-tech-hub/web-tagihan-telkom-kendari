@extends('templates.master')

@section('page_title', isset($company) ? 'Edit Company' : 'Add Company')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($company) ? 'Edit' : 'Add' }} Company</h4>
                <a href="{{ route('contracts.index') }}" class="btn btn-secondary btn-sm position-absolute top-0 end-0 m-3">
                    <i class="bi bi-x-lg"></i> Cancel
                </a>
            </div>

            <div class="card-body">
                <form action="{{ isset($company) ? route('contracts.update', $company->id) : route('contracts.store') }}" method="POST">
                    @csrf
                    @if (isset($company))
                        @method('PUT')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="companyName" name="company_name" value="{{ isset($company) ? $company->company_name : old('company_name') }}" required>
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="companyType" class="form-label">Company Type</label>
                            <select class="form-select @error('company_type') is-invalid @enderror" id="companyType" name="company_type">
                                <option value="">-- Select Type --</option>
                                <option value="Swasta" {{ (isset($company) && $company->company_type == 'Swasta') || old('company_type') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                                <option value="Pemerintah" {{ (isset($company) && $company->company_type == 'Pemerintah') || old('company_type') == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                                <option value="BUMN" {{ (isset($company) && $company->company_type == 'BUMN') || old('company_type') == 'BUMN' ? 'selected' : '' }}>BUMN</option>
                                <option value="Perorangan" {{ (isset($company) && $company->company_type == 'Perorangan') || old('company_type') == 'Perorangan' ? 'selected' : '' }}>Perorangan</option>
                            </select>
                            @error('company_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ isset($company) ? $company->address : old('address') }}">
                             @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($company) ? $company->email : old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5>Contact Person</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="contactPersonName" class="form-label">Name</label>
                            <input type="text" class="form-control @error('contact_person_name') is-invalid @enderror" id="contactPersonName" name="contact_person_name" value="{{ isset($company) ? $company->contact_person_name : old('contact_person_name') }}" required>
                             @error('contact_person_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contactPersonPhone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('contact_person_phone') is-invalid @enderror" id="contactPersonPhone" name="contact_person_phone" value="{{ isset($company) ? $company->contact_person_phone : old('contact_person_phone') }}">
                             @error('contact_person_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ isset($company) ? 'Update Company' : 'Save Company' }}
                        </button>
                        <a href="{{ route('contracts.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection