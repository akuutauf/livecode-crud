<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $payload['products'] = Product::all();
        return view('pages.index', $payload);
    }

    public function add_products()
    {
        return view('pages.create');
    }
}
