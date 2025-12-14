<?php

use App\Http\Controllers\LearnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learner-progress', [LearnerController::class, 'index'])->name('learners.index');
