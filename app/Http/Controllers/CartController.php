<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Container;

class CartController extends Controller
{
    public function index()
    {
        $cart  = Cart::getOrCreateForUser(auth()->id());
        $items = $cart->items()->with('container')->get();
        $total = $items->sum(fn($item) => $item->price * $item->quantity);

        return view('cart.index', compact('items', 'total'));
    }

    public function add($id)
    {
        $product = Container::findOrFail($id);
        $cart    = Cart::getOrCreateForUser(auth()->id());

        $existing = $cart->items()->where('container_id', $id)->first();
        $currentQty = $existing ? $existing->quantity : 0;

        if ($product->stock !== null && $currentQty >= $product->stock) {
            return redirect()->back()
                ->with('error', 'Sorry, there is no more stock available for this product.');
        }

        if ($existing) {
            $existing->increment('quantity');
        } else {
            $cart->items()->create([
                'container_id' => $product->id,
                'quantity'     => 1,
                'price'        => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        $cart = Cart::getOrCreateForUser(auth()->id());
        $cart->items()->where('container_id', $id)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        $cart = Cart::getOrCreateForUser(auth()->id());
        $cart->items()->delete();

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
