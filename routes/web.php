<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::resource('tasks', TaskController::class);

Route::get('tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])
    ->name('tasks.toggle');

