<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

$app_name = env('APP_NAME', '');

Route::get('/validate', [AuthController::class, 'validate'])->name('validate');

<<<<<<< HEAD
Route::post('/login', [AuthController::class, 'login']);
=======
Route::post('/login', [AuthController::class, 'login'])->name('login');
>>>>>>> 8dad89438ae279f6eefdcd05390c7e5022befee6
