<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama' => 'Ezzi Morales',
            'jantina' => 'Perempuan',
            'telefon' => '0135676767',
        ]);

        // DB::table('employees')->insert([
        //     'name' => 'Nick Talman',
        //     'jantina' => 'Lelaki',
        //     'telefon' => '0135676767',
        // ]);
    }
}
