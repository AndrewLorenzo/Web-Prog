<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Fantasy',
        ]);
        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'Science Fiction',
        ]);
        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Mystery',
        ]);
        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'Romance',
        ]);
    }
}
