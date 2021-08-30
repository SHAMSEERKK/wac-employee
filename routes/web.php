<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//department
Route::post('/departments', function () {
    return view('departments');
});
Route::post('add-departmenturl', [DepartmentController::class, 'add']);
Route::get('departments', [DepartmentController::class, 'show']);
Route::post('edit-departments', [DepartmentController::class, 'editDepartment']);
Route::get('delete-departments/{id}', [DepartmentController::class, 'deleteDepartment']);

//designation
Route::get('/designations', function () {
    return view('designations');
});
Route::post('add-designationurl', [DesignationController::class, 'addDesignation']);
Route::get('designations', [DesignationController::class, 'showDesignation']);
Route::post('edit-designations', [DesignationController::class, 'editDesignation']);
Route::get('delete-designations/{id}', [DesignationController::class, 'deleteDesignation']);

// employees
Route::get('add-employeeurl', [EmployeesController::class, 'dropDown']);
Route::post('employees-add', [EmployeesController::class, 'create']);
Route::get('employees', [EmployeesController::class, 'show']);
Route::get('employee-edit/{id}', [EmployeesController::class, 'getEdit']);
Route::post('employee-update', [EmployeesController::class, 'update']);
Route::get('employee-delete/{id}', [EmployeesController::class, 'destroy']);
Route::get('emp-datatable', [EmployeesController::class, 'index'])->name('empdatatable.index');
           