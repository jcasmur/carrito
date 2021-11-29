<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Producto;

class CartController extends Controller
{
    public function add(Request $request){
        //dd($request->all());
        $producto = Producto::find($request->producto_id);

        Cart::add(
            $producto->id,
            $producto->nombre,
            $producto->precio,
            1,
            array("urlfoto"=>$producto->urlfoto)
        );
        return back()->with('success',"$producto->nombre ¡Se ha agregado al carrito!");
    }

    public function cart(){
        return view('checkout');
    }

    public function sumar(Request $request){
        Cart::update(($request->producto_id),[
            'quantity' => +1,
        ]);
        return back()->with('success', 'Se ha actualizado la cantidad del producto de su carrito!');
    }

    public function restar(Request $request){
        Cart::update(($request->producto_id),[
            'quantity' => -1,
        ]);
        return back()->with('success', 'Se ha actualizado la cantidad del producto de su carrito!');
    }


    public function removeitem(Request $request){
        //$producto = Producto::where('id', $request->id)->firtsOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        
        return back()->with('success', 'Se ha eliminado el producto de su carrito!');
    }

    public function clear(){
        Cart::clear();
        return back()->with('success', 'Se ha vaciado su carrito!');
    }


}
