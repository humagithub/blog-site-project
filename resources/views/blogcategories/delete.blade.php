<!-- Delete Blog Category Confirmation -->
@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <h2 class="mb-4">Delete Category</h2>

                <p>Are you sure you want to delete the category: <strong>{{ $category->name }}</strong>?</p>

                <form action="{{ route('blogcategories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <a href="{{ route('blogcategories.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection