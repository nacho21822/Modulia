<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Container;

class CartController extends Controller{
    public function index(){
        $cart = session('cart', []);
        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Añadimos productos al carrito
    public function add($id){
        $product = Container::findOrFail($id);
        $cart = session('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Eliminar los productos del carrito
    public function remove($id){
        $cart = session('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function clear(){
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }
}