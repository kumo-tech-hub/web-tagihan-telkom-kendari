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
                        <th>Tanggal Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td><span class="badge bg-info text-dark fs-6">CTR-000123</span></td>
                        <td><span class="fw-bold text-danger">15 Agustus 2025</span></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td><span class="badge bg-info text-dark fs-6">CTR-000124</span></td>
                        <td><span class="fw-bold text-danger">1 September 2025</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
