<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\DetailPengembalian;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::with('customer','penjualan')
                    ->latest()
                    ->paginate(10);

        return view('pengembalian.index', compact('pengembalian'));
    }

    public function create($penjualan_id)
    {
        $penjualan = Penjualan::with('details.product')
                    ->findOrFail($penjualan_id);

        return view('pengembalian.create', compact('penjualan'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $return = Pengembalian::create([
                'penjualan_id' => $request->penjualan_id,
                'customer_id' => $request->customer_id,
                'tanggal' => now(),
                'alasan' => $request->alasan,
                'status' => 'pending',
                'total' => 0
            ]);

            $total = 0;

            foreach ($request->items as $item) {

                $product = Produk::findOrFail($item['product_id']);

                $subtotal = $item['qty'] * $product->price;

                DetailPengembalian::create([
                    'pengembalian_id' => $return->id,
                    'product_id' => $product->id,
                    'qty' => $item['qty'],
                    'price' => $product->price,
                    'subtotal' => $subtotal
                ]);

                $total += $subtotal;
            }

            $return->update(['total' => $total]);

            DB::commit();

            return redirect()->route('pengembalian.index')
                ->with('success', 'Retur berhasil dibuat');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $pengembalian = Pengembalian::with('details.product','customer','penjualan')
                    ->findOrFail($id);

        return view('pengembalian.show', compact('pengembalian'));
    }

    public function approve($id)
    {
        DB::beginTransaction();

        try {
            $return = Pengembalian::with('details')
                        ->lockForUpdate()
                        ->findOrFail($id);

            if ($return->status === 'approve') {
                return redirect()->back()
                    ->with('error', 'Retur sudah di-approve');
            }

            $productIds = $return->details->pluck('product_id');

            $products = Produk::whereIn('id', $productIds)
                        ->lockForUpdate()
                        ->get()
                        ->keyBy('id');

            foreach ($return->details as $detail) {

                $product = $products[$detail->product_id] ?? null;

                if (!$product) {
                    throw new \Exception("Produk tidak ditemukan");
                }

                $product->increment('stock', $detail->qty);
            }

            $return->update([
                'status' => 'approve'
            ]);

            DB::commit();

            return redirect()->back()
                ->with('success', 'Retur berhasil di-approve');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $return = Pengembalian::findOrFail($id);

        if ($return->status === 'approve') {
            return redirect()->back()
                ->with('error', 'Retur yang sudah di-approve tidak bisa dihapus');
        }

        $return->delete();

        return redirect()->back()
            ->with('success', 'Retur berhasil dihapus');
    }
}