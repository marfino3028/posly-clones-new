<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('variant_attribute_values')->insert(
            array(
                [
                    'id' => 1,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'XS',
                    'variant_attribute_value_name' => 'Extra Small',
                ],
                [
                    'id' => 2,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'S',
                    'variant_attribute_value_name' => 'Small',
                ],
                [
                    'id' => 3,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'M',
                    'variant_attribute_value_name' => 'Medium',
                ],
                [
                    'id' => 4,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'L',
                    'variant_attribute_value_name' => 'Large',
                ],
                [
                    'id' => 5,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'XL',
                    'variant_attribute_value_name' => 'Extra Large',
                ],
                [
                    'id' => 6,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => '2XL',
                    'variant_attribute_value_name' => 'Double Extra Large',
                ],
                [
                    'id' => 7,
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => '3XL',
                    'variant_attribute_value_name' => 'Triple Extra Large',
                ],
                [
                    'id' => 8,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_code' => 'MR',
                    'variant_attribute_value_name' => 'Merah',
                ],
                [
                    'id' => 9,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_code' => 'BL',
                    'variant_attribute_value_name' => 'Blue',
                ],
                [
                    'id' => 10,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_code' => 'HJ',
                    'variant_attribute_value_name' => 'Hijau',
                ],
                [
                    'id' => 11,
                    'variant_attribute_id' => 3,
                    'variant_attribute_value_code' => 'LP',
                    'variant_attribute_value_name' => 'Lengan Panjang',
                ],
                [
                    'id' => 12,
                    'variant_attribute_id' => 2,
                    'variant_attribute_value_code' => 'LPK',
                    'variant_attribute_value_name' => 'Lengan Pendek',
                ],
            ),
        );
    }
}
