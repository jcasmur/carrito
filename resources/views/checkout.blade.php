@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 bg-light">
                @if (!Cart::isEmpty())
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>PRECIO/UNIDAD</th>
                            <th colspan="3" class="text-center">CANTIDAD</th>
                            <th>ELIMINAR</th>
                            <th>PRECIO</th>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent()->sort() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }} €</td>
                                    <td>
                                        <form action="{{ route('cart.restar') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">-</button>
                                        </form>
                                    </td>

                                    <td>{{ $item->quantity }}</td>

                                    <td>
                                        <form action="{{ route('cart.sumar') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">+</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.removeitem') }}" method='POST'>
                                            @csrf
                                            <input type="hidden" name='id' value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                                        </form>
                                    </td>
                                    <td>{{ $item->quantity*$item->price  }}  €</td>
                                </tr>
                            @endforeach
                            <tr class="table-success">
                                <td colspan="7" >TOTAL</td>
                                <td>{{ Cart::getTotal() }} €</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <p>Carrito vacío.</p>
                @endif
            </div>

        </div>
    </div>
@endsection
