<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
            'question_id' => '1',
            'order' => 1,
            'content' => 'content ='.Str::random(10),
            'numbering' => 0,
            'created_at' => now(),
            'updated_at' => now(),
    ];
});
