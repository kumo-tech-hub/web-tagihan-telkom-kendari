@extends('templates.master')

@section('page_title', 'Users')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ isset($user) ? 'Edit' : 'Tambah' }} User</h4>
        </div>

        <div class="card-body">
            <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Masukkan nama user" value="{{ isset($user) ? $user->name : old('name') }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
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
                                placeholder="Masukkan Email"
                                value="{{ isset($user) ? $user->email : old('email') }}"
                            >
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                name="password"
                                id="password"
                                placeholder="Masukkan Password"
                                value="{{old('password') }}"
                            >
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin" {{ (isset($user) && $user->role == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ (isset($user) && $user->role == 'user') ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn icon icon-left btn-primary">
                    <i data-feather="check-circle"></i>
                    {{ isset($user) ? 'Update' : 'Simpan' }}</button>
            </form>
        </div>
    </div>
</section>
@endsection