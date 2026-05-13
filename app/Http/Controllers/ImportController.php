<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\KaggleImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:csv,xlsx,xls'

        ]);

        Excel::import(
            new KaggleImport,
            $request->file('file')
        );

        return back()->with(
            'success',
            'Dataset berhasil diimport'
        );
    }
}
