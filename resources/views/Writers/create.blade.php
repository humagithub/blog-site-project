<!-- resources/views/writers/create.blade.php -->
@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
<div class="container">
    <h1>Add New Writer</h1>
    <form action="{{ route('writers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <input type="hidden" name="usertype" value="writer" id="">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('writers.index') }}" class="btn btn-secondary">Cancel</a>
       
    </form>
</div>
</div>
    </main>
</div>
@endsection