<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExcelController;

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

Route::get('/{offset?}', 'IndexController@index')->name('index')->where('offset', '[0-9]+');
Route::get('/search/{name?}', 'IndexController@search')->name('search')->where('name', '[A-Za-z]+');
Route::get('/character/{id}', 'IndexController@character')->name('character');
Route::get('/comics/{url}', 'IndexController@comics')->name('comics');

// Route for view/blade file.
Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [ExcelController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');
