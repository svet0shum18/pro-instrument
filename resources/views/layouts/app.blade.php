<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ProInstrument')</title>
    <!-- Стили -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
{{--    <link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- Подключение шапки -->
@include('partials.header')

<main class="container mt-4">
    @yield('content')
</main>

<footer class="text-center mt-4">
    <p>&copy; {{ date('Y') }} ProInstrument. Все права защищены.</p>
</footer>

<!-- Скрипты -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous">
</script>
<script src="assets/js/main.js"></script>
</body>
</html>
