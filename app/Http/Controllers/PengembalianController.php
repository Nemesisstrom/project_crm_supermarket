<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
     public function create($sale_id)
    {
        $sale = Sale::with('details')->findOrFail($sale_id);
        return view('returns.create', compact('sale'));
    }

    public function store(Request $r)
    {
        DB::beginTransaction();

        try {
            $return = ReturnModel::create([
                'sale_id' => $r->sale_id,
                'customer_id' => $r->customer_id,
                'date' => now(),
                'reason' => $r->reason,
                'total_return' => 0
            ]);

            $total = 0;

            foreach ($r->products as $p) {
                if ($p['qty'] > 0) {
                    $subtotal = $p['qty'] * $p['price'];

                    ReturnDetail::create([
                        'return_id' => $return->id,
                        'product_id' => $p['id'],
                        'qty' => $p['qty'],
                        'price' => $p['price'],
                        'subtotal' => $subtotal
                    ]);

                    // Tambah stok kembali
                    Product::where('id', $p['id'])
                        ->increment('stock', $p['qty']);

                    $total += $subtotal;
                }
            }

            $return->update(['total_return' => $total]);

            DB::commit();
            return redirect('/dashboard')->with('success','Retur berhasil');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Gagal retur');
        }
    }
}
