@extends('templates.master')

@section('page_title', 'Account Manager')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ isset($manager) ? 'Edit' : 'Tambah' }} Account Manager</h4>
        </div>

        <div class="card-body">
            <form action="{{ isset($manager) ? route('managers.update', $manager->id) : route('managers.store') }}" method="POST">
                @csrf
                @if (isset($manager))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" name="first_name" id="first_name" placeholder="Masukkan nama depan" value="{{ isset($manager) ? $manager->first_name : old('first_name') }}">
                            @if ($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email"
                                id="email"
                                placeholder="Masukkan email"
                                value="{{ isset($manager) ? $manager->email : old('email') }}"
                            >
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="phone_number">Phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" placeholder="Masukkan nomor telepon" value="{{ isset($manager) ? $manager->phone_number : old('phone_number') }}">
                            @if ($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" placeholder="Masukkan nama belakang" value="{{ isset($manager) ? $manager->last_name : old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{ (isset($manager) && $manager->status == 1) ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ (isset($manager) && $manager->status == 0) ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn icon icon-left btn-primary">
                    <i data-feather="check-circle"></i>
                    {{ isset($manager) ? 'Update' : 'Simpan' }}</button>
            </form>
        </div>
    </div>
</section>
@endsection