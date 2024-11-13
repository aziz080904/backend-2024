<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

// Route untuk autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route yang dilindungi dengan Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::put('/employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
    Route::get('/employees/{id}', [EmployeeController::class, 'show']);
    Route::get('/employees/search/{name}', [EmployeeController::class, 'search'])->name('employees.search');
    Route::get('/employees/status/active', [EmployeeController::class, 'active'])->name('employees.active');
    Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive'])->name('employees.inactive');
    Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated'])->name('employees.terminated');
});
