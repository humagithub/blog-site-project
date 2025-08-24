@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
<div class="container">
    <h1>Writer Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $writer->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $writer->email }}</p>
            @if($writer->image)
                <img src="{{ asset('profile_images/' . $writer->image) }}" alt="{{ $writer->name }}" class="img-fluid" width="150">
            @else
                <p>No image available.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('writers.index') }}" class="btn btn-primary mt-3">Back to Writers List</a>
</div>
</div>
    </main>
</div>
@endsection