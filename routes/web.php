<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** костыли, чтобы работало на vercel. По хорошему это всё должно находиится в api... */

Route::group(['middleware' => 'api', 'prefix' => 'laravel_api'], function () {
    Route::resource('questions', 'App\Http\Controllers\QuestionController');
    Route::resource('answers', 'App\Http\Controllers\AnswerController');
//    Route::get('questions/{id}/answers', 'App\Http\Controllers\AnswerController@index');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
