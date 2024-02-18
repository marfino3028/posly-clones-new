<?php

use Database\Seeders\ProductsSeeder;
use Database\Seeders\ProductVariantsSeeder;
use Database\Seeders\ProductWarehousesSeeder;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;
use Database\Seeders\SaleDetailSeeder;
use Database\Seeders\SaleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmailMessagesSeeder::class,
            smsMessagesSeeder::class,
            PosSettingSeeder::class,
            PaymentMethodSeeder::class,
            CurrencySeeder::class,
            SettingSeeder::class,
            PermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionRoleSeeder::class,
            ProductUnitSeeder::class,
            WarehouseSeeder::class,
            VariantAttributeSeeder::class,
            VariantAttributeValueSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            categoriesSeeder::class,
            ProductsSeeder::class,
            ProductVariantsSeeder::class,
            ProductWarehousesSeeder::class,
            SaleSeeder::class,
            SaleDetailSeeder::class,
        ]);

    }
}