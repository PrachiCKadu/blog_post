<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #4f46e5;
            --dark-bg: #1a1b1e;
            --card-bg: #2d2e32;
            --text-primary: #ffffff;
            --text-secondary: #a1a1aa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            padding: 2rem;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .form-control {
            background-color: var(--card-bg);
            border: 1px solid #3f3f46;
            color: var(--text-primary);
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            background-color: var(--card-bg);
            border-color: var(--primary-color);
            color: var(--text-primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        .table {
            color: var(--text-primary);
        }

        .table thead th {
            border-bottom: 2px solid #3f3f46;
            color: var(--text-secondary);
        }

        .table td {
            border-bottom: 1px solid #3f3f46;
        }

        .nav-link {
            color: var(--text-secondary);
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--text-primary);
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-success {
            background-color: #10b981;
            color: white;
        }

        .alert-danger {
            background-color: #ef4444;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--card-bg);">
        <div class="container">
            <a class="navbar-brand" href="/" style="color: var(--primary-color); font-weight: 600;">Blog and Post</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts/create">Create Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>