<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::latest()->paginate(10);
        return view('produks.index', compact('products'));
    }

    public function create()
    {
        return view('produks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Produk::create($validated);

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produks.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produks.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $produk->update($validated);

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}