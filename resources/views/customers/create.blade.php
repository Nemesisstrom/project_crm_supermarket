@extends('layouts.app')

@section('content')

<h1>Tambah Customer</h1>

<form action="{{ route('customers.store') }}" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama" class="border p-2 w-full mb-2">
<input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-2">
<input type="text" name="phone" placeholder="Phone" class="border p-2 w-full mb-2">
<input type="text" name="alamat" placeholder="Alamat" class="border p-2 w-full mb-2">

<button class="bg-green-500 text-white px-4 py-2">Simpan</button>

</form>

@endsection