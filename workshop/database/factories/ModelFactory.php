<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => $faker->numberBetween(1,20),
        'pickup_time' => $faker->datetime(),
        'prom_return_time' => $faker->datetime(),
        'actual_return_time' => $faker->datetime(),
        'status' => 'tagged',
    ];
});

$factory->define(App\LogService::class, function (Faker\Generator $faker) {
    return [
        'pickup_nim' => $faker->unique()->numberBetween(13215001,13215400),
        'return_nim' => $faker->unique()->numberBetween(13215001,13215400),
        'revenue' => $faker->randomNumber(7),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'nim' => $faker->unique()->numberBetween(13215001,13215400),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'no_tlp' => 0,
        'penalty' => 0,
    ];
});

$factory->define(App\Good::class, function (Faker\Generator $faker) {
    return [
        'inventory_id' => $faker->numberBetween(1,5),
        'log_id' => $faker->numberBetween(1,20),
    ];
});

$factory->define(App\Inventory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'quantity_ready' => $faker->numberBetween(1,20),
        'quantity_broken' => $faker->numberBetween(1,20),
    ];
});

$factory->define(App\RentPrice::class, function (Faker\Generator $faker) {
    return [
        'price_per_3hour' => $faker->numberBetween(10000,20000),
        'price_per_day' => $faker->numberBetween(100000,200000),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Organization::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});