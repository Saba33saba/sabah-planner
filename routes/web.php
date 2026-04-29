<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;


Route::resource('tasks', TaskController::class);

Route::get('tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])
    ->name('tasks.toggle');



Route::get('/run-migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations executed successfully!';
});


