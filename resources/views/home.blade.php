<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <a class="navbar-brand" href="#">
                <img src="assets/img/chrlogo.svg" alt="ProInstrument" width="200" height="60">
            </a>
            <div class="dropdown">
                <button class="dropdown-catalog" id="btn-kat"><i class="fa-solid fa-bars" style="color: #F2F2F2;"></i>Каталог</button>
                <div class="dropdown-menu">
                    {{--img src="img/tools/chainsaw.png">--}}
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 1]) }}">Бензо-инструменты</a>
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 2]) }}">Климатическое оборудование</a>
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 3]) }}">Насосное оборудование</a>
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 4]) }}">Ручные и авто-инструменты</a>
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 5]) }}">Сварочное оборудование</a>
                    <a class="dropdown-item" href="{{ route('category.products', ['id' => 6]) }}">Электро-инструменты</a>
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
            <div class="login"> {{--Корзина--}}
                <button class="enter" style="font-family: Arial; color: #F2F2F2; height: 39px;" data-bs-toggle="modal" data-bs-target="#cartModal" id="open-cart-btn">Корзина</button>
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
<div id="carouselExampleAutoplaying" class="carousel slide custom-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/sliderbar/img1.png" class="d-block w-10" alt="slide1">
        </div>
        <div class="carousel-item">
            <img src="assets/img/sliderbar/img2.png" class="d-block w-100" alt="slide2">
        </div>
        <div class="carousel-item">
            <img src="assets/img/sliderbar/img3.png" class="d-block w-100" alt="slide3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Предыдущий</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Следующий</span>
    </button>
</div>
{{--Почему выбирают нас?--}}
<div class="AboutUs" id="AboutUs">
    <h2 id="caption">Почему выбирают именно нас?</h2>
    <div class="card-info">
        {{--Карточка 1--}}
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-box-open fa-xl" style="color: #D9A404;"></i>
            </div>
            <div class="text">
                <p>Большой и разнообразный ассортимент</p>
            </div>
            <div class="link">
                <p>Подробнее</p>
            </div>
        </div>
        {{--Карточка 2--}}
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-cart-flatbed fa-xl" style="color: #D9A404;"></i>
            </div>
            <div class="text">
                <p>Возможность купить товар с доставкой</p>
            </div>
            <div class="link">
                <p>Подробнее</p>
            </div>
        </div>
        {{--Карточка 3--}}
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-ranking-star fa-xl" style="color: #D9A404;"></i>
            </div>
            <div class="text">
                <p>Товары высокого качества по приятной цене</p>
            </div>
            <div class="link">
                <p>Подробнее</p>
            </div>
        </div>
        {{--Карточка 4--}}
        <div class="card" style="width: 670px; padding-left: 30px; ">
            <div class="text" style="text-align: left">
                <p>ПроИнструмент – это надежный поставщик качественных строительных материалов и оборудования. С богатым
                    ассортиментом более 1 500 000 товаров,
                    она предлагает всё необходимое для профессионального и бытового строительства.<br>
                    Компания славится своим вниманием к клиентам, обеспечивая высокий уровень сервиса и быструю доставку.
                </p>
            </div>
        </div>
    </div>
</div>
{{--Товары качественных брендов--}}
<div class="brands">
    <h2 id="caption">Мы сотрудничаем с брендами</h2>
    <div class="brand-carousel-item">
        <a href="{{ route('brand.products', ['id' => 1]) }}">
        <img src="assets/img/brandslider/aeg.jpg" alt="aeg" style="width: 200px">
        </a>
        <a href="{{ route('brand.products', ['id' => 2]) }}">
        <img src="assets/img/brandslider/fubag.jpg" alt="fubag" style="width: 200px">
        </a>
        <a href="{{ route('brand.products', ['id' => 3]) }}">
        <img src="assets/img/brandslider/gigant.jpg" alt="gigant" style="width: 200px">
        </a>
        <a href="{{ route('brand.products', ['id' => 4]) }}">
        <img src="assets/img/brandslider/inforce.jpg" alt="inforce" style="width: 200px">
        </a>
        <a href="{{ route('brand.products', ['id' => 5]) }}">
        <img src="assets/img/brandslider/keyang.jpg" alt="keyang" style="width: 200px">
        </a>
        <a href="{{ route('brand.products', ['id' => 6]) }}">
        <img src="assets/img/brandslider/makita.jpg" alt="makita" style="width: 200px">
        </a>
    </div>
</div>
{{--Популярные товары--}}
<div class="popular-products">
    <h2 id="caption">Популярные товары</h2>
    <div class="popular-products-card">
        {{--КАРТОЧКИ ТОВАРОВ--}}
        <div class="container">
            <div class="row">
                <!-- Используем цикл для отображения товаров -->
                @foreach($products as $product)
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card-product d-flex flex-column h-100">
                            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column justify-between">
                                <div class="card-content flex-grow-1">
                                    <h5 class="card-title" style="font-weight: 600;">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text"><strong>Цена: {{ $product->price }} ₽</strong></p>
                                </div>
                                <button class="btn-inbasket mt-auto add-to-cart-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">В корзину</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{--Товары для подарка--}}
<div class="product-gift">
    <h2 id="caption">Идеи полезных подарков</h2>
    <div class="popular-products-card">
        {{--КАРТОЧКИ ТОВАРОВ--}}
        <div class="container" style="margin-left: 0;">
            <div class="row">
                @foreach($giftProducts as $product)
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card-product d-flex flex-column h-100">
                            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column justify-between">
                                <div class="card-content flex-grow-1">
                                    <h5 class="card-title" style="font-weight: 600;">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text"><strong>Цена: {{ $product->price }} ₽</strong></p>
                                </div>
                                <button class="btn-inbasket mt-auto">В корзину</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{--Подписка на рассылку--}}
<div class="follow-subscribe">
    <div class="input-mail">
        <i class="fa-solid fa-envelope fa-2xl" style="color: #252525;"></i>
        <h3 id="subscribe-txt">Станьте частью круга, где знают всё первыми!</h3>
        <form class="subscribe-mail">
            <input class="mail" type="email" name="email" placeholder="Введите ваш email" required>
            <button type="submit" id="subscribe" style="">Подписаться</button>
        </form>
    </div>
</div>

<!-- Модальное окно -->
<div id="cart-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span id="close-cart" class="close">&times;</span>
        <h2>Корзина</h2>
        <div id="cart-items">
            <!-- Здесь будут отображаться товары в корзине -->
        </div>
        <button id="checkout" class="btn btn-success">Оформить заказ</button>
    </div>
</div>
{{--ПОДВАЛ--}}
<footer class="bg-dark text-white pt-4 pb-3">
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>

