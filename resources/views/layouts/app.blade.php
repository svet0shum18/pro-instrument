<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Главная')</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- ШРИФТЫ ГУГЛ -->
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
		rel="stylesheet">
	<!-- ШРИФТ С ИКОНКАМИ -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
		integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
		crossorigin="anonymous" referrerpolicy="no-referrer">





</head>

<body>
	{{-- Шапка сайта --}}
	<div class="wrapper">
		<header class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 py-4">
						<div class="header-left d-flex align-items-center">
							<a class="header-logo h3 mb-0 text-decoration-none me-1 px-4" href="{{url('/')}}"><b>ПРОИНСТРУМЕНТ</b></a>
							<div class="dropdown">
                <button class="btn-catalog px-4 py-2 d-flex align-items-center" id="btn-kat">Каталог</button>
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

							
						</div>
					</div>
					<div class="col-md-4 py-4 px-10">
						<form class="search-form d-flex align-items-center">
							<input type="text" class="form-control me-2 px-4 py-2" placeholder="Поиск товаров..." aria-label="Search">
							<button class="btn-search px-4 py-2 d-flex align-items-center" type="submit"><i
									class="fa-solid fa-magnifying-glass"></i></button>
						</form>
					</div>
					<div class="col-md-4 d-flex justify-content-start align-items-center">
						<nav class="header-nav-account">
							<ul class="d-flex align-items-center mb-0">
								@auth
									<li><a href="{{ url('/cart') }}" class="text-decoration-none h5 mb-0 me-5">Корзина</a></li>
									<li>
										<form action="{{ url('/logout') }}" method="POST">
											@csrf
											<button type="submit" class="btn-logout px-4 py-2 d-flex align-items-center">Выйти</button>
										</form>
									</li>
								@else
									<li><a href="{{ url('/login') }}" class="text-decoration-none h5 me-5">Войти</a></li>
									<li><a href="{{ url('/register') }}" class="text-decoration-none h5">Регистрация</a></li>
								@endauth
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
	</div>
	<!-- <header class="header">
		<nav>
			<ul>
				<li><a href="{{ url('/') }}">Главная</a></li>
				<li><a href="{{ url('/about') }}">О нас</a></li>
				<li><a href="{{ url('/contact') }}">Контакты</a></li>
				@auth
					<li><a href="{{ url('/dashboard') }}">Личный кабинет</a></li>
					<li>
						<form action="{{ url('/logout') }}" method="POST">
							@csrf
							<button type="submit">Выйти</button>
						</form>
					</li>
				@else
					<li><a href="{{ url('/login') }}">Войти</a></li>
					<li><a href="{{ url('/register') }}">Регистрация</a></li>
				@endauth
			</ul>
		</nav>
	</header> -->

	{{-- Основное содержимое страницы --}}
	<main>
		@yield('content')
	</main>

	{{-- Подвал (если нужен) --}}
	<footer>
		<p>&copy; {{ date('Y') }} Все права защищены.</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>