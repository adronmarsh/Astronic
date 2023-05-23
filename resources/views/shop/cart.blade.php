@extends('layout')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8">
                <div>
                    <a href="{{ route('shop', $user->id) }}" class="btn btn-link"><i class="fas fa-arrow-left"></i> Volver
                        atrás</a>
                    <h1 class="text-center">Carrito de {{ $user->user }}</h1>
                </div>
                <img class="img-menu" src="/media/cart.png" alt="Cart logo">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <ul class="list-group mt-3">
                    @foreach ($carts as $cart)
                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                            <div>
                                Cantidad
                                <form class="d-flex" action="{{ route('cart.update', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <select name="quantity" id="quantity"
                                            class="form-control form-control-sm text-center" onchange="this.form.submit()">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $cart->quantity == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div>
                                {{ $cart->product->name }}
                                |
                                @php $totalPrice = $cart->product->price * $cart->quantity;@endphp
                                @php $totalPriceOffer = $cart->product->offer * $cart->quantity;@endphp
                                @if (Auth::user()->premium == true)
                                    <span class="text-decoration-line-through">{{ $totalPrice }}€</span>
                                    {{ $totalPriceOffer }}€
                                @else
                                    {{ $totalPrice }}€
                                @endif
                            </div>
                            <div class="ml-2">
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <button type="submit" class="btn btn-primary mt-3">Realizar pedido</button>
            </div>
        </div>
    </div>
@endsection
