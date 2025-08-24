
@extends('Writer-Dashboard.master') 
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<div class="container mt-4">
    <h2>Edit Post</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('writer.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('posts_images/' . $post->image) }}" alt="Post Image" width="100" class="mt-2">
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
</div>
    </main>
</div>
@endsection
