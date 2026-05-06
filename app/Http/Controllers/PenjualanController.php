<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Customer;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('customer')
            ->latest()
            ->paginate(10);

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products  = Produk::all();

        return view('penjualan.create', compact('customers','products'));
    }

    public function store(Request $request)
    {
            DB::beginTransaction();

            try {
                $penjualan = Penjualan::create([
                    'customer_id' => $request->customer_id,
                    'tanggal'     => now(),
                    'total'       => 0
                ]);

                $total = 0;

                foreach ($request->items as $item) {
                    $product = Produk::lockForUpdate()->findOrFail($item['product_id']);

                    if ($product->stock < $item['qty']) {
                        throw new \Exception("Stok {$product->name} tidak cukup");
                    }

                    $subtotal = $item['qty'] * $product->price;

                    DetailPenjualan::create([
                        'penjualan_id' => $penjualan->id,
                        'product_id'   => $product->id,
                        'qty'          => $item['qty'],
                        'price'        => $product->price,
                        'subtotal'     => $subtotal
                    ]);

                    $product->decrement('stock', $item['qty']);

                    $total += $subtotal;
                }

                $penjualan->update(['total' => $total]);

                DB::commit();

                return redirect()->route('penjualan.index')
                    ->with('success', 'Transaksi berhasil');

            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        public function show($id)
        {
            $penjualan = Penjualan::with('details.product','customer')
                ->findOrFail($id);

            return view('penjualan.show', compact('penjualan'));
        }

        public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $penjualan = Penjualan::with('details')->findOrFail($id);

            foreach ($penjualan->details as $detail) {
                $product = Produk::lockForUpdate()->find($detail->product_id);

                if ($product) {
                    $product->increment('stok', $detail->qty);
                }
            }

            $penjualan->details()->delete();


            DB::commit();

            return redirect()->back()
                ->with('success', 'Penjualan dihapus');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
