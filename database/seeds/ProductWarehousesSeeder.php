<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductWarehousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_warehouse')->insert(
            array(
                [
                    'id' => 1,
                    'product_id' => 1,
                    'product_variant_id' => 1,
                    'warehouse_id' => 1
                ],
                [
                    'id' => 2,
                    'product_id' => 1,
                    'product_variant_id' => 2,
                    'warehouse_id' => 1
                ],
                [
                    'id' => 3,
                    'product_id' => 1,
                    'product_variant_id' => 3,
                    'warehouse_id' => 1
                ],
                [
                    'id' => 4,
                    'product_id' => 2,
                    'product_variant_id' => 1,
                    'warehouse_id' => 1
                ],
                [
                    'id' => 5,
                    'product_id' => 2,
                    'product_variant_id' => 2,
                    'warehouse_id' => 1
                ],
                [
                    'id' => 6,
                    'product_id' => 2,
                    'product_variant_id' => 3,
                    'warehouse_id' => 1
                ]
            ),
        );    
    }
}
