@extends('layouts.app')

@section('title','Home - JKBlog')

@section('content')
<section class="hero" id="home">
  <div class="container">
    <h1>Welcome to JKBlog</h1>
    <p>Here you will find posts about programming concepts, step-by-step tutorials, and lessons</p>
  </div>
</section>

<div class="container" id="featured">
  <h2 class="section-title">Featured Posts</h2>
  <div class="featured-posts">
    @foreach ($post as $posts)
      <div class="post-card">
        <div class="post-image">
          <img src="{{ asset('img/' . $posts->image) }}" alt="{{ $posts->title }}">
        </div>
        <div class="post-content">
          <div class="post-meta"><span>{{ $posts->created_at }}</span></div>
          <h3 class="post-title">{{ $posts->title }}</h3>
          <p class="post-excerpt">{{ Str::limit($posts->description, 100) }}...</p>
          <a href="{{ route('fullpost', $posts->id) }}" class="read-more">Read More →</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
