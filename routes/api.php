<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function ($api) {
    $api->post('auth/login', \App\Http\Controllers\Auth\LoginController::class.'@login');
    $api->post('auth/register', \App\Http\Controllers\Auth\RegisterController::class.'@store');


    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->resource('courses', \App\Http\Controllers\CourseController::class);
        $api->post('courses/{course_id}/enroll/{user_id}', \App\Http\Controllers\CourseController::class.'@enroll');
    });


    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->resource('subscriptions', \App\Http\Controllers\SubscriptionController::class);
    });

    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->resource('users', \App\Http\Controllers\UserController::class);
        $api->get('users/{id}/enrollments', \App\Http\Controllers\UserController::class. '@getEnrollments');
        $api->get('users/{id}/courses', \App\Http\Controllers\UserController::class. '@getCourses');
    });
});
