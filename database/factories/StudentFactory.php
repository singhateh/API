<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female']);
    $class = $faker->randomElement(['class A', 'class B', 'class C', 'class D', 'class E']);
    return [
        
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'country' => $faker->country,
        'gender' => $gender, // we will make custom for this 
        'class' => $class, // we will make custom as well 
        'phone' => $faker->phoneNumber,
        'image' => $faker->image(public_path('images/students'), 400,300, null, false),

    ];
});
