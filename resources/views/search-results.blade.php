<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--ПОДКЛЮЧЕНИЕ GOOGLEFONTS--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
          rel="stylesheet">
    {{--ПОДКЛЮЧЕНИЕ BOOTSTRAP--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{--ПОДКЛЮЧЕНИЕ FONTAWESOME--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.7.2/css/all.css">
    {{--ПОДКЛЮЧЕНИЕ SLYLE.CSS--}}
    <link href="assets/css/main.css" rel="stylesheet">
    <title>ПРОинструмент</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="assets/img/chrlogo.svg" alt="ProInstrument" width="200" height="60">
            </a>
            <div class="dropdown">
                <button class="dropdown-catalog" id="btn-kat"><i class="fa-solid fa-bars" style="color: #F2F2F2;"></i>Каталог</button>
                <div class="dropdown-menu">
                    {{--img src="img/tools/chainsaw.png">--}}
                    <a class="dropdown-item" href="#">Бензо-инструменты</a>
                    <a class="dropdown-item" href="#">Климатическое оборудование</a>
                    <a class="dropdown-item" href="#">Насосное оборудование</a>
                    <a class="dropdown-item" href="#">Ручные и авто-инструменты</a>
                    <a class="dropdown-item" href="#">Сварочное оборудование</a>
                    <a class="dropdown-item" href="#">Электро-инструменты</a>
                </div>
            </div>
            {{--ПОИСК--}}
            <div class="form-container">
                <form class="d-flex" action="{{ route('search') }}" method="GET">
                    <input
                        class="form-control me-2"
                        type="search"
                        name="query"
                        placeholder="Поиск по сайту"
                        aria-label="Search"
                        value="{{ request('query') }}"> <!-- Для сохранения введенного текста -->
                    <button class="btn-search" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="color: #F2F2F2;"></i>
                    </button>
                </form>
            </div>
            <div class="login">
                <button class="enter" style="font-family: Arial; color: #F2F2F2; height: 39px;">Корзина</button>
            </div>
            {{--            <div class="login">--}}
            {{--                <a href="{{ route('login') }}" class="btn btn-primary" style="font-family: Arial; color: #FFF; height: 39px;">В корзину</a>--}}
            {{--            </div>--}}
            <div class="info">
                <i class="fa-solid fa-location-dot fa-lg"></i>
                <p id="inftxt">г.Владивосток</p>
                <i class="fa-solid fa-phone fa-lg"></i>
                <p id="inftxt">+7(924)308-15-76</p>
            </div>
        </div>
    </nav>
</header>
    <div>
        <h2 id="caption" style="margin-top: 40px; margin-left: 100px">Результаты поиска для: "{{ request('query') }}"</h2>
    </div>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-start">
            @foreach($products as $product)
                <div class="col-3">
                    <div class="card-product h-100" style="width: 100%;">
                        <div class="card-body">
                            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="text-center"><strong>Цена:</strong> {{ number_format($product->price, 2, '.', ' ') }} ₽</p>
                            <button class="btn btn-warning w-100" data-id="{{ $product->id }}">В корзину</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<footer class= "bg-dark text-white pt-4 pb-3" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <!-- Map Section -->
            <div class="col-md-4 mb-6">
                <h5>Наш адрес</h5>
                <div class="map-city">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1134.8383541431979!2d132.06098994160817!3d43.297639095441994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5fb3bca1ca8b5f6d%3A0x3fd2b441cff944af!2z0YPQuy4g0JvQtdGA0LzQvtC90YLQvtCy0LAsIDcw0LAsINCi0YDRg9C00L7QstC-0LUsINCf0YDQuNC80L7RgNGB0LrQuNC5INC60YDQsNC5LCDQoNC-0YHRgdC40Y8sIDY5MDkxMg!5e0!3m2!1sru!2sus!4v1737705762439!5m2!1sru!2sus"
                        width="250" height="200" style="border-radius: 10px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <p class="mt-2">г.Владивосток, п.Трудовое, ул.Лермонтова,70
                    стр 5,2 этаж, ТЦ Лермонтов</p>
            </div>
            <!-- Contacts Section -->
            <div class="col-md-4 mb-4">
                <h5>Контакты</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-telephone-fill"></i> +7 (924) 308-1576</li>
                    <li><i class="bi bi-envelope-fill"></i> proinstrument@mail.ru</li>
                    <li><i class="bi bi-clock-fill"></i> Пн-Пт: 9:00 - 20:00</li>
                </ul>
            </div>
            <!-- Sitemap Section -->
            <div class="col-md-4 mb-4">
                <h5>Карта сайта</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Главная</a></li>
                    <li><a href="#AboutUs" class="text-white">О нас</a></li>
                    <li><a href="#" class="text-white">Услуги</a></li>
                    <li><a href="#" class="text-white">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <p class="mb-0">© 2025 ПроИнструмент. Все права защищены.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous">
</script>
<script src="assets/js/main.js"></script>
</body>

</html>




