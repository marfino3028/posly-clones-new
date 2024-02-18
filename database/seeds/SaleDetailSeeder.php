<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('sale_details')->insert(
            array(
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 1,
                    'product_variant_id' => 1,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 1,
                    'product_variant_id' => 2,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 1,
                    'product_variant_id' => 3,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 2,
                    'product_variant_id' => 4,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 2,
                    'product_variant_id' => 5,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id' =>  1,
                    'date' => now(),
                    'sale_id' => 1,
                    'product_id' => 2,
                    'product_variant_id' => 6,
                    'imei_number' => 12345,
                    'price' => 200000, // ini adalah total per product variant yg dikali dengan quantity jadi total awal (harga + diskon + additional) x quantity
                    'sale_unit_id' =>   1,
                    'TaxNet' => '2%',
                    'tax_method' => 'percent',
                    'discount' => 5000,
                    'discount_method' => 'nominal',
                    'total' => 1950000,
                    'quantity' => 1,
                    'created_at' => now(), 
                    'updated_at' => now()
                ],               
            ),
        );    
    }
}
