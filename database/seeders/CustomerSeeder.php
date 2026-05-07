<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'phone' => '0811111111',
            'alamat' => 'Jakarta'
        ]);

        Customer::create([
            'nama' => 'Siti',
            'email' => 'siti@gmail.com',
            'phone' => '0822222222',
            'alamat' => 'Bandung'
        ]);
    }
}
