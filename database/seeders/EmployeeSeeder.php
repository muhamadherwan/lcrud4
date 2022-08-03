<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // old away
        // DB::table('employees')->insert([
        //     'nama' => 'Zuck',
        //     'jantina' => 'Perempuan',
        //     'telefon' => '0135676767',
        // ]);

        // DB::table('employees')->insert([
        //     'name' => 'Nick Talman',
        //     'jantina' => 'Lelaki',
        //     'telefon' => '0135676767',
        // ]);

        // better way
        Employee::create(
            ['nama' => 'Mat Zuck',
            'jantina' => 'lelaki',
            'telefon' => '012344567'
            ]);

        Employee::create([
            'nama' => 'Ezi Moralez',
            'jantina' => 'perempuan',
            'telefon' => '0123456'
        ]);
        
        Employee::create([
            'nama' => 'Taylor Otwel',
            'jantina' => 'lelaki',
            'telefon' => '0123456'
        ]);    

    }
}
