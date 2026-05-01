<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DonasiKu')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
