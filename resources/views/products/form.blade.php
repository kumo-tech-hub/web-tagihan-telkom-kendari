@extends('templates.master')

@section('page_title', 'Products')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ isset($product) ? 'Edit' : 'Tambah' }} Product</h4>
        </div>

        <div class="card-body">
            <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Masukkan nama produk" value="{{ isset($product) ? $product->name : old('name') }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <label for="price">Harga</label>
                            <input
                                type="number"
                                class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                name="price"
                                id="price"
                                placeholder="Masukkan harga produk"
                                value="{{ isset($product) ? $product->price : old('price') }}"
                            >
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        
                            <div class="form-control-icon d-flex align-items-center justify-content-center">
                                <span class="d-block {{$errors->has('price') ? '' : 'mt-4'  }}">Rp.</span>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Masukkan deskripsi produk">{{ isset($product) ? $product->description : old('description') }}</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{ (isset($product) && $product->status == 1) ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ (isset($product) && $product->status == 0) ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn icon icon-left btn-primary">
                    <i data-feather="check-circle"></i>
                    {{ isset($product) ? 'Update' : 'Simpan' }}</button>
            </form>
        </div>
    </div>
</section>
@endsection