<?php
use Illuminate\Support\Facades\Route;

/**
 * Santri Routes
 * This section deals with the system that applies to santri
 * 
 * middleware                       : auth, role:santri, isDeleted
 * prefix                           : santri
 * path of controller / namespace   : Santri
 * as                               : santri.{...}
 */
Route::group([
    'middleware'    => ['role:santri'],
    'prefix'        => 'santri',
    'namespace'     => 'Santri',
    'as'            => 'santri.'
], function () {
    Route::get('', function () {
        return 'Selamat Datang';
    })->name('index');
    
    /* // Global Routes
    Route::get('/', 'HomeController@index')->name('index');
    // Hafalan Routes
    Route::group([
        'prefix'    => 'hafalan',
        'as'        => 'hafalan.'
    ], function () {
        
        // Index Routes
        Route::get('', 'HafalanController@index')->name('index');
        // Accept request hafalan
        Route::post('/{data}', 'HafalanController@processHafalan')->name('process');
        
    });
    // Mutabaah Yaumiyah Routes
    Route::group([
        'prefix'    => 'mutabaah',
        'as'        => 'mutabaah.'
    ], function () {
        
        // Index Routes
        Route::get('', 'MutabaahController@index')->name('index');
        // Accept and process mutabaah requests
        Route::post('/{data}', 'MutabaahController@process')->name('process');
    }); */
}); // end:santri routes
