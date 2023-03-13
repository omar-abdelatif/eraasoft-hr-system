<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{
    public function index(){
        return view('Employee.index');
    }
    public function ViewData()
    {
        $admin = DB::table('users')->get();;
        $adminCount = $admin->count();
        $employees = DB::table('employee')->get();
        $employeeCount = $employees->count();
        return View::make('Admin.home', compact('employees', 'employeeCount', 'admin', 'adminCount'));
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
        $store = DB::table('employee')->insert([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "ssn" => $request->ssn,
            "age" => $request->age,
            "address" => $request->address,
            "pastjob" => $request->pastjob,
            "leader" => $request->leader,
            "job_desc" => $request->job_desc,
            "status" => $request->status,
            "salary" => $request->salary,
            "img" => $name,
        ]);
        if ($store) {
            return redirect('dashboard');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $delete = $employee->delete();
        if ($delete) {
            return View::make("Admin.home")->with('success', 'Employee Deleted Successfully');
        }
        return redirect("Admin.home")->withErrors('Something Went Wrong While Deleting');
    }
    public function edit($id)
    {
        $edit = DB::table('employee')->find($id);
        return view("Employee.edit", compact("edit"));
    }
    public function update(Request $request)
    {
        $update = DB::table('employee')->where("id", $request->id)->update($request->except("id", "_token"));
        if ($update) {
            return redirect('dashboard')->with('success', 'Employee Info Updated Successfully');
        }
        return redirect('dashboard')->withErrors('Error Happen While Updating Plz Try Again');
    }
}
?>
