<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cages_name extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cages_name = [
            ['name' => 'Metalowa', 'eyes_number' => 6],
            ['name' => 'Południowa', 'eyes_number' => 1],
            ['name' => 'Zielona', 'eyes_number' => 12],
            ['name' => 'Skrzynia', 'eyes_number' => 2],
        ];

        foreach ($cages_name as $cg){
            DB::table('cages_name')->insert([
               'name' => $cg['name'],
               'eyes_number' => $cg['eyes_number'],
            ]);
        }
    }
}
