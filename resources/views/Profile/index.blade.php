@extends('Admin.layouts.master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-4">
                <h2 class="mb-4">Profile Page</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow p-4">
                    <div class="row align-items-center">
                        <!-- Profile Image -->
                        <div class="col-md-3 text-center">
                        @if($user->image)
    <img src="{{ asset('profile_images/' . $user->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
@else
    <img src="{{ asset('default-profile.png') }}" class="rounded-circle" width="120" height="120" alt="Default Profile">
@endif

                        </div>

                        <!-- Name & Email -->
                        <div class="col-md-9">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Profile Image:</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>

                                <!-- Update Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-save"></i> Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>
@endsection
