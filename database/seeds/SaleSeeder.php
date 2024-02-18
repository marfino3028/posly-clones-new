<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('sales')->insert(
            array(
                [
                    'id' => 1,
                    'user_id' => 1,
                    'date' => now(),
                    'Ref' => 'mar123',
                    'is_pos' => '1',
                    'tax_rate' => '2%',
                    'TaxNet' => '2%',
                    'discount' => '5000',
                    'discount_type' => 'nominal',
                    'discount_percent_total' => '2%',
                    'shipping' => 2,
                    'GrandTotal' => 150000,
                    'paid_amount' => 150000,
                    'payment_statut' => '',
                    'transfer_evidence' => '',
                    'statut' => '',
                    'notes' => '',
                    'is_purchase_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null,
                    'due_date' => null
                ],
              
            ),
        );    
    }
}
