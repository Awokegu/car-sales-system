<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Car Sales System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="text-center">
        <h1>Car Sales System</h1>
    </header>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-center fixed-bottom bg-light py-2">
    <p>&copy; {{ date('Y') }} Car Sales System</p>
</footer>

</body>
</html>
