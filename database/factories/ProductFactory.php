<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\product::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'name'=>$name,
        'slug'=>Str::slug($name),
        'price'=>$faker->randomFloat(45,579),
        'sub_category_id'=>rand(1,20),
    ];
});
