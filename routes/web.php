<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
    Route::get('managerlist', [ManagerController::class, 'index'])->name('Manager.index');
    Route::view('addmanager', 'Manager.addnew')->name('Manager.addnew');
    Route::post('store', [ManagerController::class, 'create'])->name('Manager.create');
    Route::get('delete/{id}', [ManagerController::class, 'delete'])->name('Manager.delete');
    //! Department Routes
    //! Branch Routes
    //! Payment Routes
    //! Application Routes
    //! Leave Routes
    //! Position Routes
    //! Attendance Routes
});
