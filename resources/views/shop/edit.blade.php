@extends('layout')

@section('title')
    Tienda
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4 mt-5 p-4">

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3 class="mt-3">Nombre</h3>
                        <input type="text" name="name" id="name" value="{{ $product->name }}">
                        <h3 class="mt-3">Precio</h3>
                        <input type="text" name="price" id="price" value="{{ $product->price }}">
                        <h3 class="mt-3">Oferta</h3>
                        <input type="text" name="offer" id="offer" value="{{ $product->offer }}">

                        @if ($product->url)
                            @if (in_array(pathinfo($product->url, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'jfif']))
                                <img class="card-img-top mt-3" src="{{ $product->url }}" alt="{{ $product->title }}">
                            @elseif (in_array(pathinfo($product->url, PATHINFO_EXTENSION), ['mp4']))
                                <video class="card-img-top mt-3" controls>
                                    <source src="{{ $product->url }}" type="video/mp4">
                                </video>
                            @endif
                        @endif
                        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
