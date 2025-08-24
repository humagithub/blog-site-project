@foreach ($adminPosts as $post)
    <h3>{{ $post->title }} (Admin Post)</h3>
@endforeach

@foreach ($userPosts as $post)
    <h3>{{ $post->title }} (User Post)</h3>
@endforeach
