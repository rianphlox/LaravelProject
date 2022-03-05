<?php

// use App\Http\Controllers\PagesController;

use App\Http\Controllers\StudentsController;
use App\Models\Students;
use Illuminate\Support\Facades\App;
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


// Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/masters', 'StudentsController@masters')->name('masters');
Route::get('/students/diploma', 'StudentsController@diploma')->name('diploma');
Route::get('/students/part-time', 'StudentsController@part_time')->name('part-time');
Route::get('/students/{mat}/{programme}/courses/', 'StudentsController@courses')->name('courses');
Route::get('/students/register/{programme}/{mat}/', 'StudentsController@register')->name('register');
Route::post('/students/register/', [
    'uses' => 'StudentsController@addcourse',
    'as' => 'students.addcourse'
]);
Route::view('/students/broadsheet', 'students.broadsheet')->name('broadsheet');
Route::get('/students/results/{programme}/{course_code}', ['as' => 'results', 'uses' => 'StudentsController@results']);

// Route::resource('students', 'StudentController');
Route::resource('/students', 'StudentsController');