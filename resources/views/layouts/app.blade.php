<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow mb-6">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between">
            <a href="/" class="text-xl font-bold">تطبيق المهام</a>

            <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">
                المهام
            </a>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="max-w-6xl mx-auto px-4">
        @yield('content')
    </div>

</body>

</html>
