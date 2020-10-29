<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tasks', 'TaskController');

//Route::post('/first/{task}', 'TaskController@first')->name('tasks.first');
//Route::post('/up/{task}', 'TaskController@up')->name('tasks.up');
//Route::post('/down/{task}', 'TaskController@down')->name('tasks.down');
//Route::post('/last/{task}', 'TaskController@last')->name('tasks.last');

Route::get('file-import-export', 'UserController@fileImportExport')->name('file.import.export');
Route::post('file-import', 'UserController@fileImport')->name('file.import');
Route::get('file-export', 'UserController@fileExport')->name('file.export');
