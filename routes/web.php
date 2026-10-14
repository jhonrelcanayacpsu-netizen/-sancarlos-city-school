<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
Route::get('/', [SchoolController::class, 'index']);
Route::get('/about', [SchoolController::class, 'about']);
Route::get('/courses', [SchoolController::class, 'courses']);
Route::get('/contact', [SchoolController::class, 'contact']);
Route::post('/enroll', [SchoolController::class, 'enroll']);
Route::get('/students', [SchoolController::class, 'students']);
