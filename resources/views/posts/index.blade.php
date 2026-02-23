@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1>Latest Posts</h1>
    
    <div class="mb-3">
        <a href="{{ url('/feed') }}" class="btn btn-warning">
            Subscribe to RSS Feed
        </a>
    </div>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                        <p class="text-muted">Posted: {{ $post->created_at->diffForHumans() }}</p>
                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection