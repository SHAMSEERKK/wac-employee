<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\EmployeeController;
use  App\Http\Controllers\TestController;
use App\Http\Controllers\EmployeesController;

use Illuminate\Support\Facades\Mail;



//home
Route::get('/', function () {
    return redirect('login');
});
Route::post('/departments', function () {
    return view('departments');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('addDepartmenturl',[EmployeeController::class,'add']);
Route::get('departments',[EmployeeController::class,'show']);
Route::post('edit-departments',[EmployeeController::class,'editDepartment']);
Route::get('delete-departments/{id}', [EmployeeController::class,'deleteDepartment']);


//designation
Route::get('/designations', function () {
    return view('designations');
});
Route::post('add-designationurl',[EmployeeController::class,'addDesignation']);
Route::get('designations',[EmployeeController::class,'showDesignation']);
Route::post('edit-designations',[EmployeeController::class,'editDesignation']);
Route::get('delete-designations/{id}', [EmployeeController::class,'deleteDesignation']);





// employees

Route::get('addemployeeurl',[EmployeesController::class,'dropDown']);
Route::post('employees-add',[EmployeesController::class,'create']);
Route::get('employees',[EmployeesController::class,'show']);
Route::get('employee-edit/{id}',[EmployeesController::class,'getEdit']);
Route::post('employee-update',[EmployeesController::class,'update']);
Route::get('employee-delete/{id}', [EmployeesController::class,'destroy']);
Route::get('empdatatable', [EmployeesController::class, 'index'])->name('empdatatable.index');











