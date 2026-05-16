<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(10);

        return view(
            'produks.index',
            compact('produks')
        );
    }

    public function create()
    {
        return view('produks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'currency' => 'required'
        ]);

    Produk::create($validated);

    return redirect()
        ->route('produks.index')
        ->with('success', 'Produk berhasil ditambahkan');

    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return redirect()
            ->route('produks.index')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}
