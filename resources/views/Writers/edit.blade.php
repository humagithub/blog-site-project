<!-- resources/views/writers/edit.blade.php -->
@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
<div class="container">
    <h1>Edit Writer</h1>
    <form action="{{ route('writers.update', $writer->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $writer->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $writer->email }}" required>
        </div>
        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control">
            @if($writer->image)
                <img src="{{ asset('profile_images/' . $writer->image) }}" alt="{{ $writer->name }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('writers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>
    </main>
</div>
@endsection