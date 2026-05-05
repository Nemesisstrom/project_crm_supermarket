<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🔍 Semua produk
    public function index()
    {
        return response()->json(Produk::latest()->get());
    }

    // ➕ Tambah produk
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $product = Produk::create($request->all());

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product
        ]);
    }

    // 🔍 Detail produk
    public function show($id)
    {
        return response()->json(Produk::findOrFail($id));
    }

    // ✏️ Update produk
    public function update(Request $request, $id)
    {
        $product = Produk::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $product->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $product
        ]);
    }

    // 🗑️ Hapus produk
    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}