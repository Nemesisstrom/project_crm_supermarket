<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel {
    public function model(array $row){
        return new Customer([
            'name' => $row[0],
            'email' => $row[1],
            'phone' => $row[2],
            'address' => $row[3],
        ]);
    }
}
