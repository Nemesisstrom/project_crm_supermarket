@extends('layouts.app')

@section('content')

<div class="card shadow border-0 rounded-4">

    <div class="card-body">

        <h3 class="mb-4">
            Upload Dataset Kaggle
        </h3>

        <form action="{{ route('import.kaggle') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Upload CSV / Excel</label>

                <input type="file"
                       name="file"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-success">

                Upload Dataset

            </button>

        </form>

    </div>

</div>

@endsection
