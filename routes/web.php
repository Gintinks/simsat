<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LoginCosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\ManagemenDlhController;




Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/manajemenDlh', 'PlayerController@index')->name('manajemenDlh')->middleware('manajemnenDlh');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/tps', 'ScoutController@index')->name('tps')->middleware('tps');

Route::get('/login', [LoginCosController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginCosController::class, 'authenticate'])->name('login');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/userList', [AdminController::class, 'index'])->name('userList')->middleware('is_admin');

Route::get('/onlyTps', [TpsController::class, 'index'])->name('onlyTps')->middleware('is_tps');

Route::get('/onlyManagemenDlh', [ManagemenDlhController::class, 'index'])->name('onlyManagemenDlh')->middleware('is_managemendlh');



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