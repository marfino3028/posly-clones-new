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
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'XS',
                    'variant_attribute_value_name' => 'Extra Small',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'S',
                    'variant_attribute_value_name' => 'Small',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'M',
                    'variant_attribute_value_name' => 'Medium',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'L',
                    'variant_attribute_value_name' => 'Large',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => 'XL',
                    'variant_attribute_value_name' => 'Extra Large',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => '2XL',
                    'variant_attribute_value_name' => 'Double Extra Large',
                ],
                [
                    'variant_attribute_id' => 1,
                    'variant_attribute_value_code' => '3XL',
                    'variant_attribute_value_name' => 'Triple Extra Large',
                ],
            ),
        );
    }
}
