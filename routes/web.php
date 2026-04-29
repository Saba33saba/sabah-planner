<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::resource('tasks', TaskController::class);

Route::get('tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])
    ->name('tasks.toggle');
use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations executed successfully!';
});



