@extends('Front.master')

@section('content')
<main class="mb-8 px-4 md:px-8">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 inline-block">Explore Blog Categories</h2>

        {{-- Display success message --}}
        @if(session('success'))
            <p class="text-green-600 font-semibold mb-4">{{ session('success') }}</p>
        @endif

        {{-- Categories --}}
        <div class="flex flex-wrap justify-center gap-4 mb-10">
            @foreach($categories as $category)
            <a href="{{ route('posts.byCategory', $category->name) }}"
   class="px-5 py-2 bg-white border border-gray-200 rounded-lg shadow-md text-gray-700 hover:bg-blue-500 hover:text-white transition duration-200">
    {{ $category->name }}
</a>

            @endforeach
        </div>

        {{-- Optional: Category Form (uncomment to use) --}}
        <!--
        <form action="{{ route('blogcategory.store') }}" method="POST" class="flex flex-col md:flex-row items-center justify-center gap-4">
            @csrf
            <input type="text" name="name" placeholder="Enter Category Name" required
                   class="px-4 py-2 border rounded-md w-full md:w-auto focus:outline-none focus:ring focus:border-blue-300" />
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                Add Category
            </button>
        </form>
        -->
    </div>
</main>
@endsection
