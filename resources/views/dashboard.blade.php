@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
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
@endsection
