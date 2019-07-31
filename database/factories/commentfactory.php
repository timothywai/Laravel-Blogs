<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraph,
        'blog_id' => function() {
            return factory(App\Blog::class)->create()->id;
        },

    ];
});
