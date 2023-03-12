<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    // use
    public function index(){
        return view('Employee.index');
    }
    public function ViewData()
    {
        $admin = User::all();
        $adminCount = $admin->count();
        $employees = Employee::all();
        $employeeCount = $employees->count();
        return view('Admin.home', compact('employees', 'employeeCount', 'admin', 'adminCount'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ssn' => 'required|unique:employee,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:employee,phone_number',
            'address' => 'required',
            'img' => 'required',
            'pastjob' => 'required',
            'leader' => 'required',
            'job_desc' => 'required',
            'status' => 'required',
            'salary' => 'required',
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $img->move($destinationPath, $name);
        }
        $store = DB::table('employee')->insert($request->except('_token'));
        if ($store) {
            return redirect('dashboard');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
    public function delete($id)
    {
        $delete = DB::table('employee')->delete($id);
        if ($delete) {
            return view("Admin.home")->with('success', 'Employee Deleted Successfully');
        }
        return redirect("Admin.home")->withErrors('Something Went Wrong While Deletion');
    }
}
?>
