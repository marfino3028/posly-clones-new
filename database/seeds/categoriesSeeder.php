<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'code' => 'CAT001',
                'name' => 'Category 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CAT002',
                'name' => 'Category 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more categories as needed
        ];

        // Insert data into categories table
        DB::table('categories')->insert($categories);
    }
}