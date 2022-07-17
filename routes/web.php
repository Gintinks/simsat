<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LoginCosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\ManagemenDlhController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\SampahController;





Route::get('/listsampah', function () {
    return view('listSampah');
});


Auth::routes();

//Route::get('/manajemenDlh', 'PlayerController@index')->name('manajemenDlh')->middleware('manajemnenDlh');
//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
//Route::get('/tps', 'ScoutController@index')->name('tps')->middleware('tps');

Route::get('/', [LoginCosController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginCosController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginCosController::class, 'logout'])->name('logout');

Route::get('/register', [AdminRegisterController::class, 'index'])->name('register')->middleware('is_admin');
Route::post('/register', [App\Http\Controllers\AdminRegisterController::class, 'store'])->name('register');
Route::post('/delete', [App\Http\Controllers\AdminRegisterController::class, 'destroy'])->name('delete');
Route::get('/userList', [AdminRegisterController::class, 'viewUser'])->name('userList')->middleware('is_admin');
// Route::post('/register', [App\Http\Controllers\AdminRegisterController::class, 'viewUser'])->name('viewUser')->middleware('is_admin');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

// Route::get('/userList', [AdminController::class, 'index'])->name('userList')->middleware('is_admin');

Route::get('/onlyTps', [TpsController::class, 'index'])->name('onlyTps')->middleware('is_tps');
Route::get('/inputtps', [TpsController::class, 'input'])->name('inputtps')->middleware('is_tps');

Route::get('/onlyManagemenDlh', [ManagemenDlhController::class, 'index'])->name('onlyManagemenDlh')->middleware('is_managemendlh');

Route::get('/sampahList', [SampahController::class, 'showSampahTps'])->name('sampahList')->middleware('is_tps_managementdlh');
Route::get('/sampah-list', [SampahController::class, 'showHalamanSampahTps'])->name('sampahList')->middleware('is_tps_managementdlh');

Route::get('/sampahInputView', [SampahController::class, 'indexInput'])->name('sampahInputView')->middleware('is_tps');
Route::get('/sampahInput', [SampahController::class, 'storeSampah'])->name('sampahInput');

Route::post('/sampah-filter', [SampahController::class, 'sampahFilter'])->name('sampahFilter')->middleware('is_tps_managementdlh');

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