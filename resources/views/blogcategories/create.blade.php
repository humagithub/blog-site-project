<!-- Create Blog Category -->
@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <h2 class="mb-4">Add New Category</h2>

                {{-- Display Errors --}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{-- Category Form --}}
                <form action="{{ route('blogcategories.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control mb-2" placeholder="Category Name" required>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection