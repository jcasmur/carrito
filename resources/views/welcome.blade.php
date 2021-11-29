@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card-header">Orders
            @if (!Cart::isEmpty())
                <a style="float:right;" href="{{ route('cart.checkout') }}">
                    <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">VER CARRITO <span class="badge badge-danger">{{ Cart::getTotalQuantity() }}</span></button>
                </a>
                <a style="float:right;" href="{{ route('cart.clear') }}">
                    <form action="{{ route('cart.clear') }}" method="post">
                        @csrf
                        <input style="float:left;" type="submit" name="btn" class="bnt btn-secondary btn-sm" value="VACIAR CARRITO">
                    </form>
                </a>
            @endif
        </div>

        <div class="row">

            <div class="col-sm-3 bg-light">
                @if (!Cart::isEmpty())
                    <a href="{{ route('cart.checkout') }}" class="btn btn-success" style="float:left; margin-right: 5px;">
                        VER CARRITO <span class="badge badge-danger">{{ Cart::getTotalQuantity() }}</span></a>
                    <form action="{{ route('cart.clear') }}" method="post">
                        @csrf
                        <input style="float:left;" type="submit" name="btn" class="btn btn-danger" value="VACIAR CARRITO">
                    </form>

                @endif
            </div>

            <div class="col-sm-9">
                <div class="row justify-content-center">
                    @forelse ($productos as $item)
                        <div class="col-4 border p-5 mt-5 text-center">
                            <h1>{{ $item->nombre }}</h1>
                            <p>{{ $item->precio }} €</p>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                <input type="submit" name="btn" class="btn btn-success" value="ADD TO CART">
                            </form>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
