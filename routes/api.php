<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
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

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/jobs', JobController::class);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/employers', EmployerController::class);
Route::apiResource('/duties', DutyController::class);
Route::apiResource('/personals', PersonalController::class);
Route::apiResource('/contacts', ContactsController::class);
Route::apiResource('/users', UserController::class);