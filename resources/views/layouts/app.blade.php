<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','JKBlog')</title>
    <link rel="stylesheet" href="{{ asset('homestyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
    </style>
    @livewireStyles
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="logo text-2xl font-bold">
                    JK<span class="text-blue-600">Blog</span>
                </a>
                
                <div class="nav-links flex space-x-4">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('home') }}#featured">Blog</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                    @if(Route::has('login'))
                        @auth
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" 
                                    class="px-4 py-2 text-gray-800 hover:text-blue-600"
                                    style="background:none; border:none; cursor:pointer; font-size:inherit;">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Login</a>
                            @if(Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @if (!request()->is('dashboard') && !request()->is('admin/*'))
        <footer >
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>About JKBlog</h3>
                        <p>A blog dedicated to Laravel, PHP, and modern web development practices.</p>
                        <br>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h3>Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('home') }}#featured">Blog</a></li>
                            <li><a href="{{ route('home') }}#about">About Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-column"></div>
                </div>
            </div>
        </footer>
    @endif

    @livewireScripts
</body>
</html>
