@extends('templates.master')

@section('page_title', isset($manager) ? 'Edit Account Manager' : 'Add Account Manager')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($manager) ? 'Edit' : 'Add' }} Account Manager</h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($manager) ? route('managers.update', $manager->id) : route('managers.store') }}" method="POST">
                    @csrf
                    @if (isset($manager))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($manager) ? $manager->name : old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($manager) ? $manager->email : old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ isset($manager) ? $manager->phone_number : old('phone_number') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" required>
                                    <option value="1" {{ (isset($manager) && $manager->status == 1) || old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ (isset($manager) && $manager->status == 0) || old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">{{ isset($manager) ? 'Update' : 'Save' }}</button>
                        <a href="{{ route('managers.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection