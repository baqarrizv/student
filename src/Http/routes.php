<?php

use Illuminate\Support\Facades\Route;
use Student\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Student Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for the Student module.
| The routes are automatically loaded by the ServiceProvider.
|
*/

Route::middleware(['web'])->group(function () {
    Route::resource('students', StudentController::class);
});
