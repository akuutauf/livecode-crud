<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'categories' => Category::select('name')->groupBy('name')->orderBy('name', 'asc')->get(),
        ];

        return view('pages.product.index', $payload);
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
            'categories' => Category::orderBy('name', 'asc')->get(),
        ];

        return view('pages.product.create', $data);
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
            'photo' => 'mimes:jpg,jpeg,png|max:10240',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|string',
        ]);

        // mengecek apakah field untuk upload foto sudah upload atau belum
        if ($request->file('photo')) {
            $saveData['photo'] = Storage::putFile('public/image', $request->file('photo'));
        }

        // validasi field satu persatu sebelum dilakukan insert
        Product::create([
            'name' => $validated['name'],
            'photo' => $saveData['photo'],
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
            'categories' => Category::orderBy('name', 'asc')->get(),
        ];

        return view('pages.product.form', $data);
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
        // get data foto product
        $data = Product::findOrFail($id);

        // fungsi validasi
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:10240',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|string',
        ]);

        // mengecek apakah field untuk upload foto sudah upload atau belum
        if ($request->file('photo')) {
            // hapus data foto sebelumnya terlbih dahulu
            Storage::delete($data->photo);

            // simpan foto yang baru
            $saveData['photo'] = Storage::putFile('public/image', $request->file('photo'));
        } else {
            $saveData['photo'] = $data->photo;
        }

        // query update
        Product::where('id', $id)->update([
            'name' => $validated['name'],
            'photo' => $saveData['photo'],
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

        // hapus data foto
        Storage::delete($data->photo);

        // hapus data
        $data->delete();

        return redirect()->route('index.product');
    }
}
