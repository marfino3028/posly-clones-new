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
                    'variant_code' => 'UK',
                    'variant_name' => 'Ukuran',
                ],
            ),
        );
    }
}
