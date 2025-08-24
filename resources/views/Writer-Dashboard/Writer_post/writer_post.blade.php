@extends('Writer-Dashboard.master')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        
            <h1 class="mt-4 text-primary"><i class="fas fa-file-alt"></i> Show  Writer Posts</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item active text-secondary"><i class="fas fa-list"></i> Posts</li>
            </ol>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-dark">All Posts</h4>
                <a href="{{ route('writer.posts.create') }}" class="btn btn-lg btn-success">
                    <i class="fas fa-plus"></i> Add Post
                </a>
            </div>

            <div class="card shadow-sm">
              
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td><strong>{{ $post->title }}</strong></td>
                                <td>{{ Str::limit($post->content, 50) }}</td>
                                <td class="text-center">
                                    @if($post->image)
                                        <img src="{{ asset('posts_images/'.$post->image) }}" width="100" class="rounded shadow-sm">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $post->status == 'Published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('writer.posts.edit', $post->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Delete Button with Modal -->
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $post->id }})">
    <i class="fas fa-trash-alt"></i> Delete
</button>

<form id="delete-form-{{ $post->id }}" action="{{ route('writer.posts.destroy', $post->id) }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

                                    <!-- End Modal -->
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(postId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + postId).submit();
            }
        });
    }

  
</script>
