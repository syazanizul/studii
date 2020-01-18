<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam;
use Faker\Generator as Faker;

$factory->define(Exam::class, function (Faker $faker) {
    return [
        'name'=> 'Sijil Pelajaran Malaysia',
        'name_shortened'=> 'SPM',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
