@extends('templates.master')

@section('page_title', 'Account Managers')

@section('content')
<div class="page-content">

    <div class="mb-4">
        <a href="{{ route('managers.create') }}" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i> Add Account Manager
        </a>
    </div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">Account Manager List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($managers as $manager)
                        <tr>
                            <td>{{ $manager->name }}</td>
                            <td>{{ $manager->email }}</td>
                            <td>{{ $manager->phone_number ?? '-' }}</td>
                            <td>
                                @if($manager->status)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No account managers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $managers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection