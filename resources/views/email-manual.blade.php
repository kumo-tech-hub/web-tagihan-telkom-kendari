@extends('templates.master')

@section('page_title', 'Email Manually')
@section('content')
<div class="page-content">
    <!-- Tabel Daftar Contract (contoh statis) -->
    <div class="card mb-4">
        <div class="card-header">Contract List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Contract Number</th>
                        <th>Company</th>

                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($contracts) --}}
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    @foreach ($contracts as $contract)
                        <tr>
                            <td>{{ $contract->contract_number }}</td>
                            <td>{{ $contract->company->company_name}}</td>
                            <td>{{ $contract->start_date->format('d M Y')  }}</td>
                            <td>{{ $contract->end_date->format('d M Y')  }}</td>
                            <td>
                                @if($contract->paid_status == 'Paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unpaid</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('mail.send',$contract->id)}}" method="POST" >
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="email" value=" {{ $contract->company->email }} ">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="bi bi-mail"></i> send email</button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
