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

Route::post('/course', [
    'uses' => 'CourseController@postCourse',
    'middleware' => 'auth.jwt'
]);

Route::get('/courses', [
   'uses' => 'CourseController@getCourses'
]);

Route::put('/course/{id}', [
    'uses' => 'CourseController@putCourse',
    'middleware' => 'auth.jwt'
]);

Route::delete('/course/{id}', [
    'uses' => 'CourseController@deleteCourse',
    'middleware' => 'auth.jwt'
]);

Route::post('/user', [
    'uses' => 'UserController@signup'
]);

Route::post('/user/signin', [
    'uses' => 'UserController@signin'
]);