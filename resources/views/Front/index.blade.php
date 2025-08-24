@extends('Front.master')
@section('content')
    
<main class="main">

    <section id="latest-posts" class="latest-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Latest Posts</h2>
            <div><span>Check Our</span> <span class="description-title">Latest Posts</span></div>
        </div>

        <!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @foreach($posts as $post)
                    <div class="col-lg-4">
                        <a href="{{ route('front.posts.show', $post->slug) }}">
                        <article>
                            <div class="post-img">
                            <img src="{{ asset('posts_images/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                            </div>

                           
                            <h2 class="title">
                                <a href="{{ route('front.posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
                            <div class="d-flex align-items-center">
    @if ($post->user && $post->user->image)
        <img src="{{ asset('profile_images/' . $post->user->image) }}" 
             alt="{{ $post->user->name }}" 
             class="img-fluid post-author-img flex-shrink-0">
    @else
        <!-- Display default image if no user or no image -->
    @endif
    <div class="post-meta">
        <p class="post-author">{{ $post->user->name ?? 'Admin' }}</p>
        <p class="post-date">
            <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('M d, Y') }}</time>
        </p>
    </div>

</div>

                        </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </section><!-- /Latest Posts Section -->

</main>
@endsection
