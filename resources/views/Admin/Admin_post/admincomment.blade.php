@extends('Admin.layouts.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-primary"><i class="fas fa-comments"></i> All Comments</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item active text-secondary"><i class="fas fa-comment"></i> Comments</li>
            </ol>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i> Comments List
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Comment</th>
                                <th>Post Writer Name</th>
                                <th>Commented By</th>
                                <th>Post Title</th>
                                <th>Date</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->comment}}</td>
                                <td>{{ $comment->owner->name ?? 'Admin'}}</td>
                                <td>{{ $comment->user->name ?? 'Unknown' }}</td>
                                <td>{{ $comment->post->title ?? 'Post not found' }}</td>
                                <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                            
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
