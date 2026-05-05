public function store(Request $request)
{
    DB::beginTransaction();
    try {
        $sale = Penjualan::create([
            'customer_id' => $request->customer_id,
            'date' => now(),
            'total' => 0
        ]);

        $total = 0;

        foreach ($request->products as $item) {
            $produk = Produks::find($item['product_id']);

            $subtotal = $item['qty'] * $product->price;

            detail_penjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $produk->id,
                'qty' => $item['qty'],
                'harga' => $produk->harga,
                'subtotal' => $subtotal
            ]);

            // update stok
            $product->decrement('stock', $item['qty']);

            $total += $subtotal;
        }

        $sale->update(['total' => $total]);

        DB::commit();
        return response()->json(['message' => 'Transaksi berhasil']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()]);
    }
}