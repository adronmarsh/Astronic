@extends('layout')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8">
                <h1 class="text-center">Carrito de {{ $user->user }}</h1>
                <img class="img-menu" src="/media/cart.png" alt="Cart logo">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <ul class="list-group mt-3">
                    @foreach ($carts as $cart)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                {{ $cart->product->name }}
                                |
                                {{ $cart->product->price }}€

                            </div>
                            <form class="d-flex" action="{{ route('cart.update', $cart->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                Cantidad:
                                <input type="text" name="quantity" id="quantity" class="form-control mr-2" value="{{ $cart->quantity }}"  onchange="document.getElementById('quantity').submit()">
                            </form>
                            <form class="ml-2" action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger">Eliminar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
