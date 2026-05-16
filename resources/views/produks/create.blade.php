@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header">
            Tambah Produk
        </div>

        <div class="card-body">

            <form action="{{ route('produks.store') }}"
                  method="POST">

                @csrf

                {{-- Nama Produk --}}
                <div class="mb-3">

                    <label class="form-label">

                        Nama Produk

                    </label>

                    <input type="text"
                           name="nama_produk"
                           class="form-control"
                           placeholder="Masukkan nama produk"
                           required>

                </div>

                {{-- Harga --}}
                <div class="mb-3">

                    <label class="form-label">

                        Harga

                    </label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           required>

                </div>

                {{-- Stok --}}
                <div class="mb-3">

                    <label class="form-label">

                        Stok

                    </label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           required>

                </div>

                {{-- Currency --}}
                <div class="mb-3">

                    <label class="form-label">

                        Mata Uang

                    </label>

                    <select name="currency"
                            class="form-control">

                        <option value="IDR">

                            Rupiah

                        </option>

                        <option value="USD">

                            Dollar

                        </option>

                        <option value="EUR">

                            Euro

                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan Produk

                </button>

            </form>

        </div>

    </div>

</div>

@endsection