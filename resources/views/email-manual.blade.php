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
                        <th>Contract Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis, ganti dengan loop data dari backend -->
                    <tr>
                        <td>Contract A</td>
                        <td>2025-07-01</td>
                        <td>2026-07-01</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#sendMailModal"><i class="bi bi-envelope"></i> Send Mail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Contract B</td>
                        <td>2024-01-01</td>
                        <td>2025-01-01</td>
                        <td><span class="badge bg-secondary">Expired</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#sendMailModal"><i class="bi bi-envelope"></i> Send Mail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form Mail Manual -->
    <div class="modal fade" id="sendMailModal" tabindex="-1" aria-labelledby="sendMailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMailModalLabel">Send Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="mailTo" class="form-label">To</label>
                            <input type="email" class="form-control" id="mailTo" name="to" required>
                        </div>
                        <div class="mb-3">
                            <label for="mailSubject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="mailSubject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="mailBody" class="form-label">Message</label>
                            <textarea class="form-control" id="mailBody" name="body" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
