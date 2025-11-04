<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Post')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e7ec 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        border-bottom: 1px solid #3d566e;
    }

    .navbar-brand {
        font-weight: 700;
        color: #ecf0f1 !important;
        font-size: 1.4rem;
        letter-spacing: 0.5px;
    }

    .container-content {
        flex: 1;
        padding-top: 35px;
        padding-bottom: 45px;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        overflow: hidden;
    }

    .card:hover {
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        transform: translateY(-3px);
    }

    .card-header {
        background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
        color: white;
        border: none;
        border-radius: 0 !important;
        font-weight: 600;
        padding: 1.2rem 1.5rem;
        font-size: 1.1rem;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        padding: 0.5rem 1.2rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
    }

    .btn-danger {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
    }

    .user-info {
        color: #bdc3c7;
        margin-right: 18px;
        font-size: 0.95rem;
        font-weight: 500;
        background: rgba(255,255,255,0.05);
        padding: 8px 16px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .logout-btn {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.2);
        color: #ecf0f1;
        padding: 7px 18px;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 6px;
        font-weight: 500;
    }

    .logout-btn:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-1px);
        color: white;
    }

    .nav-link {
        transition: all 0.3s ease;
        font-weight: 500;
        color: #ecf0f1 !important;
        margin: 0 3px;
        border-radius: 6px;
        padding: 8px 16px !important;
        position: relative;
    }

    .nav-link:hover,
    .nav-link.active {
        background: rgba(255,255,255,0.12);
        color: white !important;
        transform: translateY(-1px);
    }

    .alert-container {
        position: fixed;
        top: 85px;
        right: 25px;
        z-index: 1050;
        max-width: 420px;
    }

    .alert {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-left: 5px solid;
        backdrop-filter: blur(10px);
    }

    .alert-success {
        background: rgba(213, 244, 230, 0.95);
        color: #155724;
        border-left-color: #27ae60;
    }

    .alert-danger {
        background: rgba(248, 215, 218, 0.95);
        color: #721c24;
        border-left-color: #e74c3c;
    }

    .navbar-toggler {
        border: 1px solid rgba(255,255,255,0.25);
        padding: 0.4rem 0.6rem;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px rgba(255,255,255,0.25);
    }

    .btn-close {
        opacity: 0.7;
        transition: all 0.2s ease;
    }

    .btn-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .navbar-nav {
            margin-top: 12px;
            padding: 12px;
            background: rgba(0,0,0,0.15);
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }
        
        .user-info {
            margin-bottom: 12px;
            text-align: center;
            display: block;
            background: rgba(255,255,255,0.08);
        }
        
        .alert-container {
            right: 20px;
            left: 20px;
            max-width: none;
            top: 80px;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
    }

    /* Subtle background pattern */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 15% 50%, rgba(52, 152, 219, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 85% 30%, rgba(39, 174, 96, 0.03) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
    }
</style>
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">📰 Sistem Post</a>
            @if(Auth::check())
                            <span class="nav-link text-light"> Anda Login sebagai: <strong>{{ Auth::user()->name }}</strong></span>
                    @endif
            <div class="d-flex align-items-center order-lg-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}">Tags</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="logout-btn nav-link">Logout</button>
                        </form>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alert Container -->
    <div class="alert-container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Main content -->
    <div class="container container-content">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>