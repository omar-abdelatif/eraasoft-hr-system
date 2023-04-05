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
    public function addNew()
    {
        $departments = Department::all();
        $departmentCount = Department::count();
        return view('Departments.addnew', compact('departments', 'departmentCount'));
    }
    public function create(Request $request)
    {
        $Validator = $request->validate([
            'name' => 'required|string',
            'manager_name' => 'required|string'
        ]);
        $store = Department::create([
            'name' => $request->name,
            'manager_name' => $request->manager_name
        ]);
        if ($store) {
            return redirect()->route('Departments.index')->with('success', 'Department Created Successfuly');
        }
        return redirect()->route('Departments.index')->withErrors($Validator);
    }
}
