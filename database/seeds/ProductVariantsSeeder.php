<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variants')->insert(
            array(
                [
                    'id' => 1,                    
                    'product_id' => 1,
                    'variant_code' => 'VARCODE12345',
                    'variant_name_type_barcode' => 'BARCODE12345',
                    'code' => 12345,
                    'name_product_variant' => 'Ukuran Baju XL',
                    'additional_cost' => 15000,
                    'additional_price' => 15000,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 5
                ],
                [
                    'id' => 2,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234567',
                    'variant_name_type_barcode' => 'BARCODE1234567',
                    'code' => 1234567,
                    'name_product_variant' => 'Warna Baju Merah',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_id' => 8
                ],
                [
                    'id' => 3,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE123456789',
                    'variant_name_type_barcode' => 'BARCODE123456789',
                    'code' => 123456789,
                    'name_product_variant' => 'Ukuran Lengan Panjang Baju',
                    'additional_cost' => 10000,
                    'additional_price' => 10000,
                    'variant_attribute_id' => 3,
                    'variant_attribute_value_id' => 11
                ],
                [
                    'id' => 4,                    
                    'product_id' => 2,
                    'variant_code' => 'VARCODE123451212',
                    'variant_name_type_barcode' => 'BARCODE123451212',
                    'code' => 123453434,
                    'name_product_variant' => 'Ukuran Baju Large',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 4
                ],
                [
                    'id' => 5,
                    'product_id' => 2,
                    'variant_code' => 'VARCODE12345673434',
                    'variant_name_type_barcode' => 'BARCODE12345673434',
                    'code' => 12345673434,
                    'name_product_variant' => 'Warna Baju Biru',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_id' => 9
                ],
                [
                    'id' => 6,
                    'product_id' => 2,
                    'variant_code' => 'VARCODE1234567895656',
                    'variant_name_type_barcode' => 'BARCODE123456789565656',
                    'code' => 1234567895656,
                    'name_product_variant' => 'Ukuran Lengan Pendek Baju',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 3,
                    'variant_attribute_value_id' => 12
                ],
                [
                    'id' => 7,                    
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589123',
                    'variant_name_type_barcode' => 'BARCODE1234512389',
                    'code' => 12345123,
                    'name_product_variant' => 'Ukuran Baju XS',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 1
                ],
                [
                    'id' => 8,                    
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233',
                    'variant_name_type_barcode' => 'BARCODE12345123819',
                    'code' => 12345123,
                    'name_product_variant' => 'Ukuran Baju S',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 2
                ],
                [
                    'id' => 9,                    
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233',
                    'variant_name_type_barcode' => 'BARCODE1234512312389',
                    'code' => 121234345,
                    'name_product_variant' => 'Ukuran Baju M',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 3
                ],
                [
                    'id' => 10,                    
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121123233',
                    'variant_name_type_barcode' => 'BARCODE1234512311232389',
                    'code' => 121212334345,
                    'name_product_variant' => 'Ukuran Baju L',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 4
                ],
                [
                    'id' => 11,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233123',
                    'variant_name_type_barcode' => 'BARCODE1234512312389123',
                    'code' => 121234341233125,
                    'name_product_variant' => 'Ukuran Baju 2XL',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 6
                ],
                [
                    'id' => 12,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233123123',
                    'variant_name_type_barcode' => 'BARCODE1234511232312389123',
                    'code' => 121234341233121235,
                    'name_product_variant' => 'Ukuran Baju 3XL',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_id' => 7
                ],
                [
                    'id' => 13,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233112323123',
                    'variant_name_type_barcode' => 'BARCODE123451113232312389123',
                    'code' => 12123434123312131235,
                    'name_product_variant' => 'Warna Baju Merah',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_id' => 8
                ],
                [
                    'id' => 14,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121213233123123',
                    'variant_name_type_barcode' => 'BARCODE1234511232312389123',
                    'code' => 121234333121123235,
                    'name_product_variant' => 'Ukuran Baju Biru',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_id' => 9
                ],
                [
                    'id' => 15,
                    'product_id' => 1,
                    'variant_code' => 'VARCODE1234589121233123123',
                    'variant_name_type_barcode' => 'BARCODE1234511232312389123',
                    'code' => 121234341233121235,
                    'name_product_variant' => 'Ukuran Baju Hijau',
                    'additional_cost' => 0,
                    'additional_price' => 0,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_id' => 10
                ]                
               
            ),
        );      
    }
}
