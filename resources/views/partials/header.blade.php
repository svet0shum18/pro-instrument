<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="assets/img/chrlogo.svg" alt="ProInstrument" width="200" height="60">
            </a>
            <div class="dropdown">
                <button class="dropdown-catalog" id="btn-kat"><i class="fa-solid fa-bars" style="color: #F2F2F2;"></i>Каталог</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Бензо-инструменты</a>
                    <a class="dropdown-item" href="#">Климатическое оборудование</a>
                    <a class="dropdown-item" href="#">Насосное оборудование</a>
                    <a class="dropdown-item" href="#">Ручные и авто-инструменты</a>
                    <a class="dropdown-item" href="#">Сварочное оборудование</a>
                    <a class="dropdown-item" href="#">Электро-инструменты</a>
                </div>
            </div>
            {{-- Поиск --}}
            <div class="form-container">
                <form class="d-flex" action="{{ route('search') }}" method="GET">
                    <input
                        class="form-control me-2"
                        type="search"
                        name="query"
                        placeholder="Поиск по сайту"
                        aria-label="Search"
                        value="{{ request('query') }}"> <!-- Сохраняет введенный текст -->
                    <button class="btn-search" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="color: #F2F2F2;"></i>
                    </button>
                </form>
            </div>
            {{-- Корзина --}}
            <div class="login">
                <button class="enter" style= "color: #F2F2F2; height: 39px;">Корзина</button>
            </div>
            {{-- Информация --}}
            <div class="info">
                <i class="fa-solid fa-location-dot fa-lg"></i>
                <p id="inftxt">г.Владивосток</p>
                <i class="fa-solid fa-phone fa-lg"></i>
                <p id="inftxt">+7(924)308-15-76</p>
            </div>
        </div>
    </nav>
</header>
