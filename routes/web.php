<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\EmployeeController;

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
    Route::get('addnew', [EmployeeController::class, 'addNew'])->name('Employee.addnew');
    Route::post('create',[EmployeeController::class,'create'])->name('Employee.create');
    Route::get('dashboard', [EmployeeController::class, 'ViewData'])->name('Admin.home');
    Route::get('employeelist', [EmployeeController::class, 'index'])->name('Employee.index');
    Route::get("delete/{id}", [EmployeeController::class, 'delete'])->name('Employee.delete');
    Route::get("edit/{id}", [EmployeeController::class, 'edit'])->name('Employee.edit');
    Route::post("update", [EmployeeController::class, 'update'])->name('Employee.update');
    //! Manager Routes
    Route::view('addmanager', 'Manager.addnew')->name('Manager.addnew');
    Route::get('managerlist', [ManagerController::class, 'index'])->name('Manager.index');
    Route::post('store', [ManagerController::class, 'create'])->name('Manager.create');
    //! Department Routes
    //! Branch Routes
    //! Payment Routes
    //! Application Routes
    //! Leave Routes
    //! Position Routes
    //! Attendance Routes
});
