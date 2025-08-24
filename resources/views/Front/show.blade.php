@extends('Front.master')
@section('content')

<main class="main">

<!-- Page Title -->
<div class="page-title">
  <div class="breadcrumbs">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active current">Blog Details</li>
      </ol>
    </nav>
  </div>
  <div class="title-wrapper">
    <h1>Blog Details</h1>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8">

      <!-- Blog Details Section -->
      <section id="blog-details" class="blog-details section">
        <div class="container" data-aos="fade-up">
          <article class="article">
            <div class="hero-img" data-aos="zoom-in">
              <img src="{{ asset('posts_images/' . $post->image) }}" alt="Featured blog image" class="img-fluid" loading="lazy">
            </div>
            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
              <div class="content-header">
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="author-info">
                  <div class="author-details">
                    <img src="{{ asset('posts_images/' . $post->image) }}" alt="Author" class="author-img">
                    <div class="info">
                      <p class="post-meta">
                        Posted by <strong>{{ $post->user->name ?? 'Admin' }}</strong>
                        on {{ $post->created_at->format('F d, Y') }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content">
                <p class="post-content">{{ $post->content }}</p>
              </div>
            </div>
          </article>
        </div>
      </section>

      <!-- Blog Comments Section -->
<section id="blog-comments" class="py-10">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="bg-white shadow-md rounded-lg p-6">
      <div class="mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Discussion 
          <span class="text-blue-600">({{ $commentCount }})</span>
        </h3>
      </div>
      <div class="space-y-6">
        @foreach ($post->comments as $comment)
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
          <div class="flex items-start mb-3">
            <img src="{{ asset('profile_images/' . $comment->user->image) }}" alt="User Image" class="w-12 h-12 rounded-full object-cover shadow mr-4">
            <div class="flex-1">
              <div class="mb-1">
                <strong class="text-gray-900">{{ $comment->user->name }}</strong>
                <small class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</small>
              </div>
              <p class="text-gray-700">{{ $comment->comment }}</p>
            </div>
          </div>

          <!-- Replies -->
          @foreach ($comment->replies as $reply)
          <div class="ml-14 mt-4 border-l-2 border-gray-300 pl-4">
            <strong class="text-gray-800">{{ $reply->user->name }}</strong>
            <small class="text-gray-500 ml-2">{{ $reply->created_at->diffForHumans() }}</small>
            <p class="text-gray-700 mt-1">{{ $reply->reply }}</p>
          </div>
          @endforeach

          <!-- Reply Form -->
          <form action="{{ route('reply.store') }}" method="POST" class="mt-4 ml-14">
            @csrf
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <textarea name="reply" rows="2" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-blue-400 focus:border-blue-400" placeholder="Write a reply..."></textarea>
            <button type="submit" class="mt-2 inline-block bg-blue-600 text-white text-sm px-4 py-1.5 rounded hover:bg-blue-700">Reply</button>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


      <!-- Blog Comment Form Section -->
      <section id="blog-comment-form" class="blog-comment-form section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="section-header">
            <h3>Share Your Thoughts</h3>
            <p>Your email address will not be published. Required fields are marked *</p>
          </div>
          <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="post_type" value="{{ $post->post_type }}">
            <input type="hidden" name="owner_id" value="{{ $post->user->id ?? 1 }}">
            <div class="form-group">
              <label for="comment">Your Comment *</label>
              <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Write your thoughts here..." required></textarea>
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn-submit">Post Comment</button>
            </div>
          </form>
        </div>
      </section>

    </div> <!-- /.col-lg-8 -->
  </div> <!-- /.row -->
</div> <!-- /.container -->

</main>

@endsection
