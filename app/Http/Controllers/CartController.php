<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Container;

class CartController extends Controller
{
    /**
     * Muestra el carrito de la sesión actual.
     */
    public function index()
    {
        $cart  = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Añade un producto al carrito, comprobando el stock disponible.
     */
    public function add($id)
    {
        $product = Container::findOrFail($id);
        $cart    = session('cart', []);

        // Calcular la cantidad que ya hay en el carrito para este producto
        $currentQuantityInCart = $cart[$id]['quantity'] ?? 0;

        // CORRECCIÓN: Comprobar si hay stock suficiente antes de añadir
        if ($product->stock !== null && $currentQuantityInCart >= $product->stock) {
            return redirect()->back()
                ->with('error', 'Sorry, there is no more stock available for this product.');
        }

        // Si ya estaba en el carrito, incrementar cantidad; si no, añadirlo
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Elimina un producto del carrito.
     */
    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    /**
     * Vacía el carrito completo.
     */
    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}