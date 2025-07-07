@extends('templates.master')

@section('page_title', 'Kontrak Saya')
@section('content')
<div class="page-content">
    <!-- Tabel Daftar Kontrak User (statis) -->
    <div class="card mb-4">
        <div class="card-header">Daftar Kontrak Saya</div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nomor Kontrak</th>
                        <th>Produk</th>
                        <th>Tanggal Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract )
                        <tr>
                            <td class="text-center">1</td>
                            <td><span class="badge bg-info text-dark fs-6">{{ $contract->contract_number }}</span></td>
                            <td><span class="fw-bold text-danger">{{ $contract->produk->name }}</span></td>
                            <td><span class="fw-bold text-danger">{{ $contract->end_date }}</span></td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
