<?php

use App\Models\Role;
use App\Models\User;


use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'      => 'admin',
          'email'     => 'admin@mary.com',
          'password'  => bcrypt('secret'),
          'thumbnail' => 'dummy.png',
        ]);

        Role::create([
          'name'        => 'admin',
          'permissions' => json_encode(
              [
                'create-user'    => true,
                'delete-user'    => true,
                'update-user'    => true,
                'update-user'    => true,
                'block-user'      => true,
                'view-Transactions'    => true,
                'view-accounts'  => true,
                'create-accountType' => true,

                'view-role'   => true,
                'create-role' => true,
                'update-role' => true,
                'delete-role' => true,
                'assign-role' => true,
              ]
          ),
        ]);
    }
}
