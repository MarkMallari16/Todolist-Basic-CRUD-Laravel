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

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function(){
    return view('home');
})->name('home');
//register read
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
//register create 
Route::post('add-task', [TaskController::class, 'addTask'])->name('addTask');
//register update
Route::put('update-task/{id}', [TaskController::class, 'updateTask'])->name('updateTask');
//register delete
Route::delete('delete-task/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');