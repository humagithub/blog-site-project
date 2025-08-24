@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Writers</h1>
            <a href="{{ route('writers.create') }}" class="btn btn-primary mb-3">Add Writer</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> All Writers
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($writers as $writer)
                            <tr>
                                <td>{{ $writer->name }}</td>
                                <td>{{ $writer->email }}</td>
                                <td>
                                    @if($writer->image)
                                        <img src="{{ asset('profile_images/' . $writer->image) }}" width="50" height="50">
                                    @else
                                        <img src="{{ asset('default-profile.png') }}" width="50" height="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('writers.show', $writer->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('writers.edit', $writer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('writers.destroy', $writer->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

