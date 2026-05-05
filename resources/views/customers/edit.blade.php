@extends('layouts.app')

@section('content')

<h1>Edit Customer</h1>

<form action="{{ route('customers.update', $customer->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $customer->nama }}" class="border p-2 w-full mb-2">
<input type="email" name="email" value="{{ $customer->email }}" class="border p-2 w-full mb-2">
<input type="text" name="phone" value="{{ $customer->phone }}" class="border p-2 w-full mb-2">
<input type="text" name="alamat" value="{{ $customer->alamat }}" class="border p-2 w-full mb-2">

<button class="bg-blue-500 text-white px-4 py-2">Update</button>

</form>

@endsection