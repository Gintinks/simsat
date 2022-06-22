<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;




Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get/employee/list', 
        [EmployeesController::class, 'getEmployeeList'])->name('employee.list');

Route::post('/get/individual/employee/details',
        [EmployeesController::class, 'getEmployeeDetails'])->name('employee.details');

Route::post('/update/employee/data',        
    [EmployeesController::class, 'updateEmployeeData']);


Route::delete('/delete/employee/data/{employee}',
    [EmployeesController::class, 'destroy']);

// Route::post('/store/employee/data',
//     [EmployeesController::class, 'store']);

Route::post('/store/employee/data',
    [App\Http\Controllers\AddUserController::class, 'addUser']);