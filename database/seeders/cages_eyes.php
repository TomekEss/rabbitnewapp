<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class cages_eyes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cages_eyes = [
          ['id_cages_name' => 1, 'eyes_number' => 1, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 1, 'eyes_number' => 2, 'cleaning_day' => '2024-01-17'],
          ['id_cages_name' => 1, 'eyes_number' => 3, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 1, 'eyes_number' => 4, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 1, 'eyes_number' => 5, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 1, 'eyes_number' => 6, 'cleaning_day' => '2024-01-17'],
          ['id_cages_name' => 1, 'eyes_number' => 7, 'cleaning_day' => '2024-01-15'],

          ['id_cages_name' => 2, 'eyes_number' => 1, 'cleaning_day' => '2023-12-18'],

          ['id_cages_name' => 3, 'eyes_number' => 1, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 2, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 3, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 4, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 5, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 6, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 7, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 8, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 9, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 10, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 11, 'cleaning_day' => '2024-01-15'],
          ['id_cages_name' => 3, 'eyes_number' => 12, 'cleaning_day' => '2024-01-15'],

          ['id_cages_name' => 4, 'eyes_number' => 1, 'cleaning_day' => '2023-12-13'],
          ['id_cages_name' => 4, 'eyes_number' => 2, 'cleaning_day' => '2023-12-13'],
        ];

        foreach ($cages_eyes as $ce){
            DB::table('cages_eyes')->insert([
               'id_cages_name' => $ce['id_cages_name'],
               'eyes_number' => $ce['eyes_number'],
               'cleaning_day' => $ce['cleaning_day'],
            ]);
        }
    }
}
