 <!-- Tombol Add Customer -->
 <div class="mb-3">
    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#modalContactPerson">
        Tambah Contact Customer
        <i class="bi bi-plus-circle"></i>
    </button>
</div>

<!-- Table Customer List -->
<div class="card mt-4">
    <div class="card-header">Contact Customer List</div>
    <div class="card-body">
        <div class="alert alert-success" id="successAlert" style="display: none;"></div>
        <div class="alert alert-danger" id="errorAlert" style="display: none;"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>No_KTP</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($contactPeople as $contactPerson)
                    <tr>
                        <td>{{ $contactPerson->first_name }} {{ $contactPerson->last_name }}</td>
                        <td>{{ $contactPerson->no_ktp }}</td>
                        <td>{{ $contactPerson->phone_number }}</td>
                        <td>{{ $contactPerson->address }}</td>
                        <td>{{ $contactPerson->email }}</td>
                        <td>
                            <span class="badge {{ $contactPerson->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $contactPerson->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <a href="/customers/edit/{{ $customer->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                            
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
       
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="modalContactPerson" tabindex="-1" aria-labelledby="modalContactPersonTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContactPersonTitle">Tambah Contact Person Customer
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="contactPersonForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control" name="customer_id" value="{{ isset($customer) ? $customer->id : old('customer_id') }}"  />

                            <div class="form-group">
                                <label for="first_name">Nama Depan</label>
                                <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" name="first_name" id="first_name" placeholder="Masukkan nama depan">
                                @if ($errors->has('first_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Nama Belakang</label>
                                <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" placeholder="Masukkan nama belakang" >
                                @if ($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="no_ktp">No KTP</label>
                                <input type="text" class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" name="no_ktp" id="no_ktp" placeholder="Masukkan No KTP" >
                                @if ($errors->has('no_ktp'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('no_ktp') }}
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
                                    
                                >
                                @if ($errors->has('phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" placeholder="Masukkan alamat">
                                @if ($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Masukkan email">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
    
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" id="saveButton" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>