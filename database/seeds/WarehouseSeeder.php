<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('warehouses')->insert(
            array(
                [
                    'name' => 'Gudang Utama',
                ],
            ),
        );
    }
}
