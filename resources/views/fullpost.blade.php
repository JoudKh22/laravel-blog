@extends('layouts.app')

@section('title',$post->title.' - JKBlog')

@section('content')
<div class="container max-w-4xl mx-auto px-4 py-8">

    <!-- Post Header -->
    <h1 class="text-3xl font-bold mb-2 post-title">{{ $post->title }}</h1>
    <div class="flex items-center text-gray-500 text-sm mb-4 post-meta">
        <span>Published on {{ $post->created_at->format('F j, Y') }}</span>
    </div>

    <!-- Featured Image -->
    @if($post->image)
    <div class="mb-8 rounded-lg overflow-hidden">
        <img src="{{ asset('img/' . $post->image) }}" 
             alt="{{ $post->title }}" 
             class="w-full max-w-full h-auto object-cover rounded">
    </div>
    @endif

    <!-- Post Content -->
    <div class="post-content prose max-w-none mb-12">
        {!! $post->description !!}
    </div>

    <!-- Comments -->
   <livewire:comments :model="$post"/>

</div>
@endsection
