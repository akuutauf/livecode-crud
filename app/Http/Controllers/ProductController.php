<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload = [
            'products' => Product::with('category')->get(),
            'categories' => Category::select('name')->groupBy('name')->get(),
        ];

        return view('pages.index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'action' => route('store.product'),
            'categories' => Category::all(),
        ];

        return view('pages.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // fungsi validasi
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|string',
        ]);

        // validasi field satu persatu sebelum dilakukan insert
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('index.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'products'  => Product::find($id),
            'action' => route('update.product', $id),
            'categories' => Category::all(),
        ];

        return view('pages.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // fungsi validasi
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|string',
        ]);

        // validasi field satu persatu sebelum di update

        // query update
        Product::where('id', $id)->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('index.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->route('index.product');
    }
}
