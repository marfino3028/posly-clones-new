<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('variant_attributes')->insert(
            array(
                [
                    'id' => 1,
                    'variant_code' => 'UK',
                    'variant_name' => 'Ukuran',
                ],
                [
                    'id' => 2,
                    'variant_code' => 'WN',
                    'variant_name' => 'Warna',
                ],
                [
                    'id' => 3,
                    'variant_code' => 'VL',
                    'variant_name' => 'Varian Lengan',
                ],
            ),
        );
    }
}
