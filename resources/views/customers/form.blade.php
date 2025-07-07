@extends('templates.master')

@section('page_title', 'Customers')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ isset($customer) ? 'Edit' : 'Tambah' }} Customer</h4>
        </div>

        <div class="card-body">
            <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
                @csrf
                @if (isset($customer))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Nama Perusahaan</label>
                            <input type="text" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name" id="company_name" placeholder="Masukkan nama perusahaan" value="{{ isset($customer) ? $customer->company_name : old('company_name') }}">
                            @if ($errors->has('company_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input
                                type="text"
                                class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                name="phone_number"
                                id="phone_number"
                                placeholder="Masukkan nomor telepon"
                                value="{{ isset($customer) ? $customer->phone_number : old('phone_number') }}"
                            >
                            @if ($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" placeholder="Masukkan alamat" value="{{ isset($customer) ? $customer->address : old('address') }}">
                            @if ($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city" id="city" placeholder="Masukkan kota" value="{{ isset($customer) ? $customer->city : old('city') }}">
                            @if ($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="district">Distrik</label>
                            <input type="text" class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district" placeholder="Masukkan distrik" value="{{ isset($customer) ? $customer->district : old('district') }}">
                            @if ($errors->has('district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Masukkan email" value="{{ isset($customer) ? $customer->email : old('email') }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe Company</label>
                            <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" placeholder="Masukkan tipe" value="{{ isset($customer) ? $customer->type : old('type') }}">
                            @if ($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{ (isset($customer) && $customer->status == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ (isset($customer) && $customer->status == 0) ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn icon icon-left btn-primary">
                    <i data-feather="check-circle"></i>
                    {{ isset($customer) ? 'Update' : 'Simpan' }}</button>
            </form>
        </div>
    </div>
    
    @if(isset($customer))
        @include('contact_person_customer.table', ['contactPeople' => $contactPeople])
    @endif
</section>
@endsection