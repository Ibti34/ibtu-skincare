<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $products = collect([
            (object)[
                'id' => 1,
                'name' => 'Body Cream',
                'price' => 12,
                'image' => 'product1.png',
            ],
            (object)[
                'id' => 2,
                'name' => 'Face Cream',
                'price' => 15,
                'image' => 'product2.png',
            ],
        ]);

        return view('products', compact('products'));
    }
}
