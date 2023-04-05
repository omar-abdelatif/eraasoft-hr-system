<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manager;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $manager = Manager::all();
        $managerCount = Manager::count();
        return view('Departments.addnew', compact('manager', 'managerCount'));
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
            return redirect()->route('departments.index')->with('success', 'Department Created Successfuly');
        }
        return redirect()->route('departments.index')->withErrors($Validator);
    }
    public function destroy($id)
    {
        $depart = Department::find($id);
        if ($depart) {
            $depart->delete();
            return redirect()->route('departments.index')->with('success', 'Department Deleted Successfully');
        }
        return redirect()->route('departments.index')->withErrors('Something Went Wrong While Deleting');
    }
    public function edit($id)
    {
        $depart = Department::find($id);
        return view('Departments.edit', compact('depart'));
    }
    public function update(Request $request)
    {
        $depart = Department::find($request->id);
        if ($depart) {
            $depart->name = $request->name;
            $depart->manager_name = $request->manager_name;
            $update = $depart->save();
            if ($update) {
                return redirect()->route('departments.index')->with('success', 'Department Updated Successfully');
            }
            return redirect()->route('departments.index')->withErrors('Error While Updating');
        }
    }
}
