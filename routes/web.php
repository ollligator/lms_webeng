<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SolutionController;
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
    return view('index');
});

Route::get('/contact', function () {
    return view('/contact');
});


Route::get('/subjects/take', [StudentController::class, 'create'] )->name('subjects.take');
Route::resource('subjects', SubjectController::class)->middleware('auth');;
Route::resource('subject', StudentController::class)->middleware('auth');;
Route::resource('subjects.tasks', TaskController::class)->shallow()->middleware('auth');;
Route::resource('tasks.solutions', SolutionController::class)->shallow()->middleware('auth');;
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
