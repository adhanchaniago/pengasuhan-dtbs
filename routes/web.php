<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Accommodating users who visit if there is no login session
 * 
 * @return view
 */
Route::get('/', function () { 
    
    /* If an incoming session is available, immediately return to the role route */
    if(auth()->check()) 
        return redirect('/'.auth()->user()->role);

    /* 
    | If the login session is not yet available, this 
    | section will be returned by default. This can also be replaced by a landing view 
    */
    return view('auth.login'); 
});

/**
 * If an incoming session is available, 
 * the return from the login stage or registration is /home, 
 * then this section sets /home to be changed to /{role}
 * 
 * @return view
 */
Route::get('/home', function () {

    /* If the login session is not yet available, return to /login */
    if (!auth()->check()) 
        return redirect('/');

    /* If the session is available, return to /{role} */
    $UserRole = auth()->user()->role;
    return redirect()->route($UserRole . '.index');

})->name('home');

/**
* Authentication Routes
* 
* @author Rezky Maulana <rezkymaulanaa06@gmail.com>
*/
include 'Auth/routes.php';

Route::group([
    'middleware'    => ['auth']
], function () {

    /**
    * Santri Route
    * 
    * @author Rezky Maulana <rezkymaulanaa06@gmail.com>
    */
    include 'role/santri.php';

});

