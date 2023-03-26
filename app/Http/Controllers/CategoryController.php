<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload = [
            'categories' => Category::orderBy('name')->get(),
        ];

        return view('pages.category.index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'action' => route('store.category'),
        ];

        return view('pages.category.create', $data);
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
            'description' => 'nullable',
        ]);

        // validasi field satu persatu sebelum dilakukan insert
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('index.category');
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
            'category'  => Category::find($id),
            'action' => route('update.category', $id),
        ];

        return view('pages.category.form', $data);
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
            'description' => 'nullable',
        ]);

        // validasi field satu persatu sebelum di update

        // query update
        Category::where('id', $id)->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('index.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->route('index.category');
    }
}
