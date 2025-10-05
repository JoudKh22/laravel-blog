@extends('layouts.app')

@section('title','Projects - JKBlog')

@section('content')
<section class="hero" id="projects">
  <div class="container">
    <h1>Our Projects</h1>
    <p>Explore some of the projects developed and shared on JKBlog</p>
  </div>
</section>

<div class="container" id="featured">
  <h2 class="section-title">Featured Projects</h2>
  <div class="featured-posts">
    @foreach ($projects as $project)
      <div class="post-card">
        <!-- Image -->
        <div class="post-image">
          <img src="{{ asset('img/' . $project->image) }}" alt="{{ $project->title }}">
        </div>

        <!-- Content -->
        <div class="post-content">
          <div class="post-meta"><span>{{ $project->created_at->format('M d, Y') }}</span></div>
          <h3 class="post-title">{{ $project->title }}</h3>
          <p class="post-excerpt">{{ Str::limit($project->description, 100) }}...</p>
          <a href="{{ route('project.full', $project->id) }}" class="read-more">Read More →</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
