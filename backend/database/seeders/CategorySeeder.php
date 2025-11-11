<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_type' => 'Khmer Literature', 'created_at' => now(), 'updated_at' => now()],
            ['category_type' => 'World Literature', 'created_at' => now(), 'updated_at' => now()],
            ['category_type' => 'Education & Research', 'created_at' => now(), 'updated_at' => now()],
            ['category_type' => 'Self-Improvement & Motivation', 'created_at' => now(), 'updated_at' => now()],
            ['category_type' => 'Technology & Science', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
