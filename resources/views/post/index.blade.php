@extends('Admin.layouts.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Show Posts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> Admin Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus-circle me-2"></i>Add Post
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i>
                    All Posts
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Writer Name</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                <td>{{ Str::limit($post->content, 50) }}</td>
                                <td>
                                    @if($post->image)
                                        <img src="{{ asset('posts_images/'.$post->image) }}" width="100" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $post->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                            <i class="fas fa-trash-alt"></i> Delete
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
    </main>
</div>
@endsection

@section('styles')
<style>
    .card-header {
        font-size: 1.25rem;
    }
    .img-thumbnail {
        border-radius: 5px;
    }
    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .thead-dark th {
        background-color: #343a40;
        color: #fff;
    }
</style>
@endsection