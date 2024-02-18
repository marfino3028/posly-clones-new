<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('products')->insert(
            array(
                [
                    'id' => 1,
                    'type' => 'is_variant',
                    'code' => 123456,
                    'Type_barcode' => 'CODE123456',
                    'name' => 'Baju',
                    'cost' => 1000000,
                    'price' => 1000000,
                    'category_id' => 1,
                    'is_promo' => 0,
                    'promo_price' => 0,
                    'is_variant' => 1,
                    'is_imei' => 0,
                    'not_selling' => 0,
                    'allowPO' => 1,
                    'image' => '1703930339.jpg'
                ],
                [
                    'id' => 2,
                    'type' => 'is_variant',
                    'code' => 1234567,
                    'Type_barcode' => 'CODE1234567',
                    'name' => 'Topi',
                    'cost' => 2000000,
                    'price' => 2000000,
                    'category_id' => 1,
                    'is_promo' => 0,
                    'promo_price' => 0,
                    'is_variant' => 1,
                    'is_imei' => 0,
                    'not_selling' => 0,
                    'allowPO' => 1,
                    'image' => '1703930339.jpg'
                ],
                [
                    'id' => 3,
                    'type' => 'is_variant',
                    'code' => 12345678,
                    'Type_barcode' => 'CODE12345678',
                    'name' => 'Celana',
                    'cost' => 3000000,
                    'price' => 3000000,
                    'category_id' => 1,
                    'is_promo' => 0,
                    'promo_price' => 0,
                    'is_variant' => 1,
                    'is_imei' => 0,
                    'not_selling' => 0,
                    'allowPO' => 1,
                    'image' => '1703930339.jpg'
                ]
            ),
        );    
    }
}
