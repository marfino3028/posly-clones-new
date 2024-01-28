<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('units')->insert(
            array(
                [
                    'name' => 'Pieces',
                    'ShortName' => 'pcs',
                    'operator' => '*',
                    'operator_value' => '1'
                ],
            ),
        );
    }
}
