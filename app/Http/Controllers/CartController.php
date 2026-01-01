<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // ✅ Import the Product model

class CartController extends Controller
{
    /**
     * Add a product to the cart
     */
    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Get existing cart from session or empty array
        $cart = session()->get('cart', []);

        // If product exists, increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name"     => $product->name,
                "price"    => $product->price,
                "image"    => $product->image,
                "quantity" => 1
            ];
        }

        // Save cart back to session
        session()->put('cart', $cart);

        // Stay on the same page and show success message
        return redirect()->back()->with('success', $product->name . ' added to cart!');
    }

    /**
     * Show the cart page
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Optional: Remove a product from the cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}
