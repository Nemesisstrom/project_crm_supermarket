public function approve($id)
{
    DB::beginTransaction();
    try {
        $return = Pengembalian::findOrFail($id);

        if ($return->status == 'approve') {
            return response()->json(['message' => 'Sudah di-approve']);
        }

        foreach ($return->details as $detail) {
            $product = Produks::find($detail->product_id);

            // kembalikan stok
            $product->increment('stock', $detail->qty);
        }

        $return->update(['status' => 'approve']);

        DB::commit();
        return response()->json(['message' => 'Return disetujui']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()]);
    }
}