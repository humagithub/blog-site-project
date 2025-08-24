@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
<div class="container-fluid px-4">
    <h1 class="mt-4">Contact Messages</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Contacts</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-envelope me-1"></i> Contact Messages
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Received At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone ?? 'N/A' }}</td>
                            <td>{{ Str::limit($contact->message, 50) }}</td>
                            <td>{{ $contact->created_at->format('F d, Y h:i A') }}</td>
                            <td>
                            <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">
        Delete
    </button>
</form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
    </main>
</div>

@endsection
