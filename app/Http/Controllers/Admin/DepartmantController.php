<?php

namespace App\Http\Controllers\Admin;

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
        return view('Departments.addnew');
    }
    public function create(Request $request)
    {
        $Validator = $request->validate(['name' => 'required|string',
        ]);
        $store = Department::create(['name' => $request->name,
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
            $update = $depart->save();
            if ($update) {
                return redirect()->route('departments.index')->with('success', 'Department Updated Successfully');
            }
            return redirect()->route('departments.index')->withErrors('Error While Updating');
        }
    }
}
