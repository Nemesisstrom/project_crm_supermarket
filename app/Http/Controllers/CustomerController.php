<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // 🔍 Get semua customer
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }

    // ➕ Tambah customer
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'alamat' => 'required'
        ]);

        $customer = Customer::create($request->all());

        return response()->json([
            'message' => 'Customer berhasil ditambahkan',
            'data' => $customer
        ]);
    }

    // 🔍 Detail customer
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    // ✏️ Update customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required',
            'alamat' => 'required'
        ]);

        $customer->update($request->all());

        return response()->json([
            'message' => 'Customer berhasil diupdate',
            'data' => $customer
        ]);
    }

    // 🗑️ Hapus customer
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Customer berhasil dihapus'
        ]);
    }
}
