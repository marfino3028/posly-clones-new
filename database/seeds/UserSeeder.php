<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Insert some stuff
        DB::table('users')->insert(
            array(
                'id' => 1,
                'username' => 'sysadmin',
                'email' => 'sysadmin@simseka.test',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'avatar' => 'no_avatar.png',
                'role_users_id' => 1,
                'is_all_warehouses' => 1,
                'status' => 1,
            )
        );
        $user = User::findOrFail(1);
        $user->assignRole(1);

        DB::table('users')->insert(
            array(
                'id' => 2,
                'username' => 'admin',
                'email' => 'admin@simseka.test',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'avatar' => 'no_avatar.png',
                'role_users_id' => 2,
                'is_all_warehouses' => 1,
                'status' => 1,
            )
        );
        $user = User::findOrFail(2);
        $user->assignRole(2);
    }
}
