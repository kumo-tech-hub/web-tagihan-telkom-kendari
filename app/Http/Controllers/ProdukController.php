<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; 

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(10);
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        Produk::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        return view('products.form', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $product = Produk::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
