<?php

namespace Database\Seeders;

use DummySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
        $this->call(DummySeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
