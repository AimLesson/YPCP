<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pius')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Keyframes for slow reveal animation */
        @keyframes slowReveal {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation class */
        .animate-slow-reveal {
            animation: slowReveal 1s ease-out;
        }
    </style>
</head>
<body>
    @include('front.layout.nav')

    <main class="animate-slow-reveal">
        @yield('content')
    </main>

    @include('front.layout.foot')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>