<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $products = collect([
            1 => [
                'name' => 'Body Cream',
                'price' => 12,
                'image' => 'product1.png',
            ],
            2 => [
                'name' => 'Face Cream',
                'price' => 15,
                'image' => 'product2.png',
            ],
        ]);

        if (!$products->has($id)) {
            return redirect()->back();
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $products[$id]['name'],
                'price' => $products[$id]['price'],
                'image' => $products[$id]['image'],
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Product added to cart');
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }
}
