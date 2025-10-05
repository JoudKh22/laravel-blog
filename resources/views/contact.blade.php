@extends('layouts.app')

@section('title','Contact - JKBlog')

@section('content')
<section class="hero">
  <div class="container">
    <h1>Contact Us</h1>
    <p>You can use the form below to contact us.</p>
  </div>
</section>

<div class="container" style="padding:40px 0;">
  @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
  @endif
  <form action="{{ route('contact.send') }}" method="POST">
    @csrf
    <label>İsim</label><br>
    <input type="text" name="name" placeholder="İsim" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" placeholder="Email" required><br><br>

    <label>Mesaj</label><br>
    <textarea name="message" placeholder="Mesajınız" rows="6" required></textarea><br><br>

    <button type="submit">Gönder</button>
</form>

</div>
@endsection
