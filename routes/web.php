<?php

use App\Http\Controllers\Admin\DepartmantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PositionContrller;

Route::get('/', function () {
    return view('Admin.auth.login');
});

Auth::routes();

Route::get('dashboard', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    //! Admin Routes
    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    //! Employee Routes
    Route::get('addnew', [EmployeeController::class, 'addNew'])->name('Employee.addNew');
    Route::post('create',[EmployeeController::class,'create'])->name('Employee.create');
    Route::get('dashboard', [EmployeeController::class, 'ViewData'])->name('Admin.home');
    Route::get('employeelist', [EmployeeController::class, 'index'])->name('Employee.index');
    Route::get("delete/{id}", [EmployeeController::class, 'delete'])->name('Employee.delete');
    Route::get("edit/{id}", [EmployeeController::class, 'edit'])->name('Employee.edit');
    Route::post("update", [EmployeeController::class, 'update'])->name('Employee.update');
    //! Manager Routes
    Route::get('addmanager', [ManagerController::class, 'addNew'])->name('Manager.addNew');
    Route::post('store', [ManagerController::class, 'create'])->name('Manager.create');
    Route::get('managerlist', [ManagerController::class, 'index'])->name('Manager.index');
    Route::get('deletemanager/{id}', [ManagerController::class, 'delete'])->name('Manager.delete');
    Route::get('editmanager/{id}', [ManagerController::class, 'edit'])->name('Manager.edit');
    Route::post('updatemanager', [ManagerController::class, 'update'])->name('Manager.update');
    //! Position Routes
    Route::get('allpositions', [PositionContrller::class, 'viewData'])->name('positions.show');
    Route::view('addposition', 'positions.addnew')->name('positions.addnew');
    Route::post('create_position', [PositionContrller::class, 'store'])->name('positions.store');
    Route::get('editposition/{id}', [PositionContrller::class, 'edit'])->name('positions.edit');
    Route::get('deleteposition/{id}', [PositionContrller::class, 'delete'])->name('positions.delete');
    Route::post('updateposition', [PositionContrller::class, 'update'])->name('positions.update');
    //! Department Routes
    Route::get('alldepartments', [DepartmantController::class, 'index'])->name('departments.index');
    Route::get('newdepartments', [DepartmantController::class, 'addNew'])->name('departments.addnew');
    Route::post('storedepartment', [DepartmantController::class, 'create'])->name('departments.create');
    Route::get('deletedepartment/{id}', [DepartmantController::class, 'destroy'])->name('departments.destroy');
    Route::get('editdepartment/{id}', [DepartmantController::class, 'edit'])->name('departments.edit');
    Route::post('updatedepartment', [DepartmantController::class, 'update'])->name('departments.update');
    //! Branch Routes
    //! Payment Routes
    //! Application Routes
    //! Leave Routes
    //! Attendance Routes
});
