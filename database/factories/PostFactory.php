<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Post;
use App\Models\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => function () {
                return factory(User::class)->create()->id;
            },

        'category_id' => function(){
             return factory(Category::class)->create()->id;
         },
        'title' => $faker->unique()->sentence,
        'content' => $faker->paragraph,
        'thumnbnail_path' => $faker->imageUrl(),
        'status' => 'draft'

    ];
});
