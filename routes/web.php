<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'RenderImageController@index');

Route::get('images', 'ImageController@listImages');
Route::get('upload', 'ImageController@upload');
Route::post('upload', 'ImageController@uploadfile');
Route::get('images/{id}/delete', 'ImageController@imageDelete');

Route::get('fonts', 'FontController@listFonts');
Route::get('font-upload', 'FontController@upload');
Route::post('font-upload', 'FontController@uploadfile');
Route::get('fonts/{id}/delete', 'FontController@fontDelete');

Route::get('render', 'RenderImageController@render');
Route::post('render', 'RenderImageController@processImage');

Route::get('upload-filename', 'FileNameController@uploadFilename');
Route::post('upload-filename', 'FileNameController@postUploadFilename');
Route::get('list-file-name', 'FileNameController@list');
Route::get('filename/{id}/delete', 'FileNameController@filenameDelete');

