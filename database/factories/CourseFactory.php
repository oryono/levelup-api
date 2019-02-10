<?php

use App\Models\Course;
use App\Models\CourseCategory;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    $category_ids = CourseCategory::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'category_id' => array_random($category_ids),
        'user_id' => array_random(User::all()->pluck('id')->toArray()),
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now(),
    ];

});
