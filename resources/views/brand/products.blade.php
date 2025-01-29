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
    <link href="/assets/css/main.css" rel="stylesheet">
    <title>ПРОинструмент</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/assets/img/chrlogo.svg" alt="ProInstrument" width="200" height="60">
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

<h2 id="caption" style="margin-top: 50px; margin-left: 100px">Товары бренда: {{ $brand->name }}</h2>

<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card" style="margin-left: 100px; margin-top: 30px;">
                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text"><strong>Цена: {{ $product->price }} ₽</strong></p>
                    <button class="btn btn-warning add-to-cart-btn" data-id="{{ $product->id }}">В корзину</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>

</html>

