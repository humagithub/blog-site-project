<!-- Edit Blog Category -->
@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <h2 class="mb-4">Edit Category</h2>

                {{-- Display Errors --}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{-- Edit Form --}}
                <form action="{{ route('blogcategories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" class="form-control mb-2" value="{{ $category->name }}" required>
                    <button type="submit" class="btn btn-warning">Update Category</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection