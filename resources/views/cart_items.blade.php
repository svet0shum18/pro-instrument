@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Корзина</h2>
        <div id="cart-items">
            @foreach($cartItems as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->product->name }}</h5>
                        <p class="card-text">Количество: {{ $item->quantity }}</p>
                        <p class="card-text">Цена: {{ $item->product->price * $item->quantity }} ₽</p>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Оформить заказ</button>
        </form>
    </div>
@endsection
