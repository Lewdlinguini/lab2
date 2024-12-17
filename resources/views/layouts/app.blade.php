<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Custom CSS -->
    <style>
        :root {
            --sidebar-bg-color: #343a40;
            --sidebar-text-color: white;
            --sidebar-brand-font-size: 28px;
            --sidebar-padding: 20px;
            --sidebar-link-hover-bg: #495057;
            --sidebar-width: 250px;
            --collapsed-sidebar-width: 60px; /* Width when collapsed */
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }

        .navbar .collapse {
            transition: all 0.3s ease;
        }

        .navbar-collapsed .navbar-collapse {
            display: none; /* Hide navbar contents when collapsed */
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }

        .footer a {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: var(--sidebar-bg-color);
            color: var(--sidebar-text-color);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            padding-top: var(--sidebar-padding);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: width 0.3s ease;
        }

        .sidebar .brand {
            font-size: var(--sidebar-brand-font-size);
            font-weight: bold;
            color: var(--sidebar-text-color);
            margin-bottom: 20px;
            text-align: center;
            cursor: pointer;
        }

        .sidebar hr {
            border-top: 1px solid #495057;
            margin-bottom: 20px;
            width: 100%; /* Make line span the full width */
        }

        .sidebar a {
            color: var(--sidebar-text-color);
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 0;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: var(--sidebar-link-hover-bg);
        }

        /* Bold Products Link */
        .sidebar a.products-link {
            font-weight: bold;
        }

        .content-wrapper {
            margin-left: calc(var(--sidebar-width) + 20px); /* Space for the expanded sidebar */
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Icon for Toggling Sidebar */
        .sidebar .brand:hover {
            transform: scale(1.1);
        }

        /* Hide Products link when sidebar is collapsed */
        .sidebar.collapsed .products-link {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎   🗣️αвѕσυℓυтє вσσкιмα</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Add navbar links here if necessary -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand" id="sidebar-toggle">🦶🦶🏻🦶🏽🦶🏼</div>
        <hr>
        <a href="{{ route('products.index') }}" class="products-link">Products</a>
    </div>

    <!-- Main Content Wrapper -->
    <div class="content-wrapper" id="content-wrapper">
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const sidebar = document.getElementById('sidebar');
    const contentWrapper = document.getElementById('content-wrapper');
    const toggleButton = document.getElementById('sidebar-toggle');
    const navbar = document.querySelector('.navbar');

    let isSidebarCollapsed = false;

    toggleButton.addEventListener('click', function () {
        if (isSidebarCollapsed) {
            sidebar.style.width = 'var(--sidebar-width)';
            contentWrapper.style.marginLeft = 'calc(var(--sidebar-width) + 20px)';
            sidebar.classList.remove('collapsed'); // Show Products link
            navbar.classList.remove('navbar-collapsed'); // Show navbar links
        } else {
            sidebar.style.width = 'var(--collapsed-sidebar-width)';
            contentWrapper.style.marginLeft = 'calc(var(--collapsed-sidebar-width) + 20px)';
            sidebar.classList.add('collapsed'); // Hide Products link
            navbar.classList.add('navbar-collapsed'); // Hide navbar links
        }
        isSidebarCollapsed = !isSidebarCollapsed;
    });

    // Ensure sidebar initializes correctly based on current width
    window.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth <= 768) { // Auto-collapse for smaller screens
            sidebar.style.width = 'var(--collapsed-sidebar-width)';
            contentWrapper.style.marginLeft = 'calc(var(--collapsed-sidebar-width) + 20px)';
            sidebar.classList.add('collapsed');
            navbar.classList.add('navbar-collapsed');
            isSidebarCollapsed = true;
        }
    });

    // Handle window resizing to adjust sidebar and content dynamically
    window.addEventListener('resize', () => {
        if (window.innerWidth <= 768 && !isSidebarCollapsed) {
            sidebar.style.width = 'var(--collapsed-sidebar-width)';
            contentWrapper.style.marginLeft = 'calc(var(--collapsed-sidebar-width) + 20px)';
            sidebar.classList.add('collapsed');
            navbar.classList.add('navbar-collapsed');
            isSidebarCollapsed = true;
        } else if (window.innerWidth > 768 && isSidebarCollapsed) {
            sidebar.style.width = 'var(--sidebar-width)';
            contentWrapper.style.marginLeft = 'calc(var(--sidebar-width) + 20px)';
            sidebar.classList.remove('collapsed');
            navbar.classList.remove('navbar-collapsed');
            isSidebarCollapsed = false;
        }
    });
</script>

</body>
</html>
