<?php

use Illuminate\Support\Facades\Route;
use App\Http\Actions;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/tasks', Actions\GetTasksAction::class)->name('tasks.get');
    Route::get('/tasks/create', Actions\Task\GetCreateAction::class)->name('tasks.create');
    Route::post('/tasks', Actions\Task\PostTaskAction::class)->name('tasks.store');
    Route::get('/tasks/{id}', Actions\GetTaskAction::class)->where('id', '[0-9]+')->name('task.get');
    Route::put('/tasks/{id}', Actions\PutTaskAction::class)->where('id', '[0-9]+')->name('task.put');
    Route::delete('/tasks/{id}', Actions\Task\DeleteTaskAction::class)->name('tasks.delete');
});
