<?php
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Nested Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'namespace' => 'Auth',
], function () {
  
    // Login
    Route::get('/login', 'AuthenticatedSessionController@create')
                ->middleware(['guest'])
                ->name('login');

    $limiter = config('fortify.limiters.login');

    Route::post('/login', 'AuthenticatedSessionController@store')
                ->middleware(array_filter([
                    'guest',
                    $limiter ? 'throttle:'.$limiter : null,
                ]));

                
    // Registration
    Route::get('/register', 'RegisteredUserController@create')
                    ->middleware(['guest'])
                    ->name('register');

    Route::post('/register', 'RegisteredUserController@store')
                ->middleware(['guest']);


    // Forgot Password
    Route::get('/forgot-password', 'PasswordResetLinkController@create')
                    ->middleware(['guest'])
                    ->name('password.request');

    Route::post('/forgot-password', 'PasswordResetLinkController@store')
                ->middleware(['guest'])
                ->name('password.email');

});