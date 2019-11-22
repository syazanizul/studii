<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
            'content_id' => '1',
            'answer' => 'answer '.Str::random(10),
            'correct' => 0,
            'created_at' => now(),
            'updated_at' => now(),
    ];
});
