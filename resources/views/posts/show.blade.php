@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>
    </nav>

    <article>
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Published: {{ $post->created_at->format('F j, Y') }}</p>
        
        <div class="mt-4">
            {{ $post->content }}
        </div>
    </article>
@endsection