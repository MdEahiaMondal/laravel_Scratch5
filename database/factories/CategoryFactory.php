<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $category = $faker->unique()->word;
    return [
       'name' => $category,
        'slug' => \Illuminate\Support\Str::slug($category)
    ];
});
