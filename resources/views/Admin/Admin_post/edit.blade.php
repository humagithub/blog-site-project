@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container">
                <h1>Edit Post</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('writer.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea class="form-control" name="content" required>{{ $post->content }}</textarea>
                    </div>

                   
                    <div class="form-group">
                        <label for="image">Image (Optional):</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    @if($post->image)
                        <img src="{{ asset('posts_images/' . $post->image) }}" width="150" class="mt-2">
                    @endif
                    <div class="form-group">
    <label class="form-label">Status</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

                    <button type="submit" class="btn btn-primary mt-3">Update Post</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
