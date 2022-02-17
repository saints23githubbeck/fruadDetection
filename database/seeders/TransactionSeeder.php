<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('transactions')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'contact' => Str::random(10),
            'ip' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'country' => Str::random(10),
        ]);
       
    }
}
