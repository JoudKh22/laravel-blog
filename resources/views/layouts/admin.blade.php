<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Panel - JKBlog')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: sans-serif; background: #f9f9f9; margin:0; }
        header { background: #111; color: #fff; padding: 15px 30px; }
        .admin-nav { display:flex; justify-content:space-between; align-items:center; }
        .admin-nav .logo { font-size: 1.5rem; font-weight: bold; }
        .admin-nav .nav-links { display:flex; gap:20px; }
        .admin-nav .nav-links a {
            color:#fff;
            font-weight:600;
            text-decoration:none;
            padding:8px 14px;
            border-radius:6px;
            transition: background 0.3s;
        }
        .admin-nav .nav-links a:hover {
            background:#333;
        }
    </style>
    @livewireStyles
</head>
<body>
    <!-- Admin Header -->
    <header>
        <div class="admin-nav">
            <div class="logo">JK<span style="color:#4CAF50">Admin</span></div>
            <div class="nav-links">
                <a href="{{ route('admin.allpost') }}"><i class="fa fa-list"></i> All Posts</a>
                <a href="{{ route('admin.allprojects') }}"><i class="fa fa-folder-open"></i> All Projects</a>
                <a href="{{ route('admin.addpost') }}"><i class="fa fa-plus"></i> Add Post</a>
                <a href="{{ route('admin.addproject') }}"><i class="fa fa-plus"></i> Add Project</a>
                <a href="{{ route('admin.contact.messages') }}"><i class="fa fa-envelope"></i> Messages</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:white;cursor:pointer;font-weight:600;">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main style="padding:30px;">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
