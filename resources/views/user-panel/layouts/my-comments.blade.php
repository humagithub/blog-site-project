@extends('user-panel.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main class="bg-light min-vh-100 py-4">
        <div class="container-fluid px-4">
            {{-- Page Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-primary fw-bold mb-0"><i class="fas fa-comments me-2"></i>All Comments</h2>
                    <p class="text-muted mb-0">Manage and review blog post comments</p>
                </div>
                <span class="badge bg-primary text-white px-3 py-2">{{ $comments->count() }} Comments</span>
            </div>

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 rounded shadow-sm bg-white">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Dashboard</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Comments</li>
                </ol>
            </nav>

            {{-- Comments Table --}}
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-header bg-gradient text-white bg-primary rounded-top-4">
                    <h5 class="mb-0"><i class="fas fa-table me-2"></i>Comments List</h5>
                </div>

                <div class="card-body bg-white rounded-bottom-4">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-hover table-bordered align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>Comment</th>
                                    <th>Post Writer</th>
                                    <th>Post Title</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr>
                                    <td class="text-dark">
                                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                                            {{ $comment->comment }}
                                        </span>
                                    </td>
                                    <td>{{ $comment->owner->name ?? 'Admin' }}</td>
                                    <td><strong>{{ $comment->post->title ?? 'Post not found' }}</strong></td>
                                    <td><small class="text-muted">{{ $comment->created_at->format('M d, Y - h:i A') }}</small></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-success me-1" title="Approve"><i class="fas fa-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
@endsection
