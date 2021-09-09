<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes:
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/employers', [EmployerController::class, 'index']);
Route::get('/duties', [DutyController::class, 'index']);
Route::get('/personals', [PersonalController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);

Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/employers/{employee}', [EmployerController::class, 'show']);
Route::get('/duties/{duty}', [DutyController::class, 'show']);
Route::get('/personals/{personal}', [PersonalController::class, 'show']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);

// protected routes group:
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/roles', RoleController::class);
    
    // delete protected routes
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    Route::delete('/jobs/{job}', [JobController::class, 'destroy']);    
    Route::delete('/employers/{employer}', [EmployerController::class, 'destroy']);
    Route::delete('/duties/{duty}', [DutyController::class, 'destroy']);
    Route::delete('/personals/{personal}', [PersonalController::class, 'destroy']);
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);
    
    // update protected routes
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::put('/jobs/{job}', [JobController::class, 'update']);    
    Route::put('/employers/{employer}', [EmployerController::class, 'update']);
    Route::put('/duties/{duty}', [DutyController::class, 'update']);
    Route::put('/personals/{personal}', [PersonalController::class, 'update']);
    Route::put('/contacts/{contact}', [ContactController::class, 'update']);
});