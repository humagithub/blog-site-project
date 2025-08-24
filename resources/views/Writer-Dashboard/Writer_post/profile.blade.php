@extends('Writer-Dashboard.master') 

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-4">
                <h2 class="mb-4">Profile Page</h2>

                @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('writer.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Profile Image:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>

    @if($user->image)
        <div class="mb-3">
            <img src="{{ asset('profile_images/' . $user->image) }}" alt="Profile Image" width="100">
        </div>
    @endif

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>

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
