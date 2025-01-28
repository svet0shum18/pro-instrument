
    <h1>Корзина</h1>

    @if (!empty($cart))
        <ul>
            @foreach ($cart as $id => $item)
                <li>
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50">
                    <strong>{{ $item['name'] }}</strong>
                    <p>Количество: {{ $item['quantity'] }}</p>
                    <p>Цена: {{ $item['price'] }} ₽</p>
                </li>
            @endforeach
        </ul>
        <a href="/cart/clear" class="btn btn-warning">Очистить корзину</a>
    @else
        <p>Корзина пуста.</p>
    @endif

