<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        // Data dummy untuk tampilan
        $products = array_fill(0, 8, (object)[
            'seller' => 'John Doe',
            'name' => 'Beras Reguler',
            'weight' => 75,
            'location' => 'Jember',
            'price' => 10000
        ]);
        return view('market.index', compact('products'));
    }
}