@extends('layouts.app')

@section('content')

<h1>Detail Customer</h1>

<p>Nama: {{ $customer->nama }}</p>
<p>Email: {{ $customer->email }}</p>
<p>Phone: {{ $customer->phone }}</p>
<p>Alamat: {{ $customer->alamat }}</p>

<a href="{{ route('customers.index') }}">Kembali</a>

@endsection