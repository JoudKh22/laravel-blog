@extends('layouts.app')

@section('title','About - JKBlog')

@section('content')
<section class="hero" id="about">
  <div class="container">
    <h1>About JKBlog</h1>
    <p>This blog is dedicated to Laravel, PHP, and modern web development tutorials.</p>
  </div>
</section>

<div class="container" style="padding:50px 0;">
    <h2 class="section-title">Our Story</h2>
    <p>JKBlog was founded to help students and developers learn modern web development step by step. We focus on practical examples and clean code.</p>


    <h2 class="section-title mt-10">Technology Stack</h2>
    <div class="flex gap-6 mt-4">
        <div class="tech-box">Laravel</div>
        <div class="tech-box">PHP</div>
        <div class="tech-box">Tailwind CSS</div>
        <div class="tech-box">MySQL</div>
    </div>

</div>
@endsection
