<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmantController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $departmentCount = Department::count();
        return view('Departments.index', compact('departments', 'departmentCount'));
    }
    public function viewData(){
        
    }
}
