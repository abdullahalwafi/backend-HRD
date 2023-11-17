<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('/departement', DepartementController::class);
    Route::resource('/position', PositionController::class);
    
    // controller untuk employees
    // crud
    Route::get('/employees', [EmployeesController::class, 'index']);
    Route::post('/employees', [EmployeesController::class, 'store']);
    Route::get('/employees/{id}', [EmployeesController::class, 'show']);
    Route::put('/employees/{id}', [EmployeesController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeesController::class, 'destroy']);

    // filter
    Route::get('/employees/search/{name}', [EmployeesController::class, 'search']);
    Route::get('/employees/status/active', [EmployeesController::class, 'active']);
    Route::get('/employees/status/inactive', [EmployeesController::class, 'inactive']);
    Route::get('/employees/status/terminated', [EmployeesController::class, 'terminated']);
});
