@extends('layouts.app')

@section('title', 'Бренды')

@section('content')
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
@endsection

