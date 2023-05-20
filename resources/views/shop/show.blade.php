@extends('layout')

@section('title')
    Tienda
@endsection

@section('content')
    <div class="row justify-content-left">
        <div class="mt-5">
            <h1>Tienda de {{ $user->user }}</h1>
            <a href="{{ route('cart.show', $user->id) }}" class="position-relative">
                <img class="img-menu" src="/media/cart.png" alt="Cart logo">
                @php
                    $items = count($user->cart);
                @endphp
                @if ($items > 0)
                    <span
                        class="position-absolute top-1 end-1 translate-middle badge bg-danger rounded-circle">{{ $items }}</span>
                @endif
            </a>
        </div>
        @foreach ($products as $product)
            <div class="col-md-4 mt-5 p-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}€</p>
                        @if ($product->url)
                            @if (in_array(pathinfo($product->url, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'jfif']))
                                <img class="card-img-top" src="{{ $product->url }}" alt="{{ $product->title }}">
                            @elseif (in_array(pathinfo($product->url, PATHINFO_EXTENSION), ['mp4']))
                                <video class="card-img-top" controls>
                                    <source src="{{ $product->url }}" type="video/mp4">
                                </video>
                            @endif
                        @endif
                        <form class="mt-3" action="{{ route('cart.store', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="productId" id="productId" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                        </form>

                        @if ($user->id == Auth()->id())
                            <div class="mt-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
