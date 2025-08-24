@extends('Front.master')

@section('content')
<main class="mb-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-10 border-b pb-4">
            Posts under "{{ $category->name }}"
        </h2>

        @if($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl duration-300">
                {{-- Image --}}
                <div class="h-48 overflow-hidden">
                    @if($post->image)
                    <img src="{{ asset('posts_images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition duration-300 hover:scale-105">
                    @else
                    <img src="{{ asset('default.jpg') }}" alt="No Image" class="w-full h-full object-cover">
                    @endif
                </div>

                {{-- Content --}}
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 truncate">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-500 mb-2">
                        <span class="block">📅 Created: {{ $post->created_at->format('d M, Y') }}</span>
                        <span class="block">✏️ Updated: {{ $post->updated_at->format('d M, Y') }}</span>
                    </p>
                    
                    <a href="{{ route('front.posts.show', $post->slug) }}" class="inline-block mt-3 text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                        Read More →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500 mt-12">
            <p class="text-lg">😕 No posts found in this category.</p>
        </div>
        @endif
    </div>
</main>
@endsection
