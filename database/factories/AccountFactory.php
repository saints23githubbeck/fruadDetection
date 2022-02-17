<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'accountNumber' => $this->faker->accountNumber,
            'status' => $this->faker->status,
            'amount' => $this->faker->status,
        ];
    }
}

//$factory->define(User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        'remember_token' => Str::random(10),
//    ];



