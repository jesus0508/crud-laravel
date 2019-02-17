<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'first_name'=>$faker->firstName,
        'last_name'=>$faker->lastName,
        'email'=>$faker->email,
        'phone_number'=>$faker->phoneNumber,
        'job_id'=>1,
        'department_id'=>1
    ];
});
