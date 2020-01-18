<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=> 'Self-Made',
        'copyright'=> '-',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
