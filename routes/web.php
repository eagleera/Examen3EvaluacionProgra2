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

Route::prefix('cursos')->group(function () {
    Route::get('/', 'CursoController@index')->name('cursos');
    Route::get('/edit/{id}', 'CursoController@indexEdit')->name('edit_curso');
    Route::put('/edit', 'CursoController@handleEdit')->name('edit_curso_handle');
    Route::delete('/delete', 'CursoController@handleDelete')->name('delete_curso_handle');
    Route::get('/delete/{id}', 'CursoController@indexDelete')->name('delete_curso');
    Route::get('/nuevo', 'CursoController@indexCreate')->name('nuevo_curso');
    Route::post('/agregar', 'CursoController@nuevoCurso')->name('agregar_nuevo_curso');
});
Route::prefix('maestros')->group(function () {
    Route::get('/', 'MaestroController@index')->name('maestros');
    Route::get('/edit/{id}', 'MaestroController@indexEdit')->name('edit_maestro');
    Route::put('/edit', 'MaestroController@handleEdit')->name('edit_maestro_handle');
    Route::delete('/delete', 'MaestroController@handleDelete')->name('delete_maestro_handle');
    Route::get('/delete/{id}', 'MaestroController@indexDelete')->name('delete_maestro');
    Route::get('/nuevo', 'MaestroController@indexCreate')->name('nuevo_maestro');
    Route::post('/agregar', 'MaestroController@nuevoMaestro')->name('agregar_nuevo_maestro');
});
Route::prefix('maestro_curso')->group(function () {
    Route::delete('/delete', 'MaestroCursosController@handleDelete')->name('delete_maestro_curso_handle');
    Route::get('/delete/{idCurso}/{idMaestro}', 'MaestroCursosController@indexDelete')->name('delete_maestro_curso');
    Route::get('/nuevo/{id}', 'MaestroCursosController@indexCreate')->name('nuevo_maestro_curso');
    Route::put('/agregar', 'MaestroCursosController@agregarMaestroCurso')->name('agregar_maestro_curso');
});
Route::get('/', 'MaestroCursosController@index');