<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Manager;
use App\Models\Positon;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $employeesCount = Employee::count();
        return view('Employee.index', compact('employees', 'employeesCount'));
    }
    public function addNew()
    {
        $positions = Positon::all();
        $positionCount = Positon::count();
        $manager = Manager::all();
        $managerCount = Manager::count();
        return view('Employee.addnew', compact('positions', 'positionCount', 'manager', 'managerCount'));
    }
    public function ViewData()
    {
        $admin = User::all();
        $adminCount = User::count();
        $employees = Employee::all();
        $employeesCount = Employee::count();
        $manager = DB::table('manager')->get();
        $managerCount = $manager->count();
        return  view('Admin.home', compact('employees', 'employeesCount', 'admin', 'adminCount', 'manager', 'managerCount'));
    }
    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'ssn' => 'required|unique:employee,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:employee,phone_number',
            'address' => 'required',
            'img' => 'required|image|max:2048|mimes:png,jpg,jpeg,webp,gif',
            'pastjob' => 'required',
            'leader' => 'required',
            'job_desc' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048'
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images/employee/');
            $img->move($destinationPath, $name);
        }
        if ($request->hasFile('pdf')) {
            $files = $request->file('pdf');
            $file_name = time() . '.' . $files->getClientOriginalExtension();
            $Path = public_path('files/');
            $files->move($Path, $file_name);
        }
        $store = Employee::create([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "ssn" => $request->ssn,
            "age" => $request->age,
            "address" => $request->address,
            "pastjob" => $request->pastjob,
            "position" => $request->position,
            "leader" => $request->leader,
            "job_desc" => $request->job_desc,
            "status" => $request->status,
            "salary" => $request->salary,
            "img" => $name,
            "pdf" => $file_name
        ]);
        if ($store) {
            return redirect()->route('Admin.home')->with('success', 'تمت الإضافة بنجاح');
        }
        return redirect()->route('addnew')->withErrors($validator);
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employees = Employee::all();
            $employeesCount = Employee::count();
            $admin = User::all();
            $adminCount = User::count();
            $manager = Manager::all();
            $managerCount = Manager::count();
            if ($employee->img !== null) {
                $oldImagePath = public_path('images/employee/' . $employee->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $employee->delete();
            return redirect()->route('Admin.home')->with([
                'success' => 'Employee Deleted Successfully',
                'employeesCount' => $employeesCount,
                'employees' => $employees,
                'admin' => $admin,
                'adminCount' => $adminCount,
                'manager' => $manager,
                'managerCount' => $managerCount
            ]);
        }
        return redirect()->route('Admin.home')->with('error', 'Something Bad Happen');
    }
    public function edit($id)
    {
        $edit = Employee::find($id);
        return view("Employee.edit", compact("edit"));
    }
    public function update(Request $request)
    {
        $employee = Employee::find($request->id);
        //! Delete Old Image
        if ($request->hasFile('img') && $employee->img !== null) {
            $oldImagePath = public_path('images/employee/' . $employee->img);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        //! Insert New Image
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $EmployeeFile = $request->file('img');
            $name = time() . '.' . $EmployeeFile->getClientOriginalExtension();
            $destinationPath = public_path('images/employee');
            $EmployeeFile->move($destinationPath, $name);
            $employee->img = $name;
        }
        //! Update User Data
        $employee->name = $request->name;
        $employee->phone_number = $request->phone_number;
        $employee->ssn = $request->ssn;
        $employee->age = $request->age;
        $employee->address = $request->address;
        $employee->pastjob = $request->pastjob;
        $employee->leader = $request->leader;
        $employee->job_desc = $request->job_desc;
        $employee->status = $request->status;
        $employee->salary = $request->salary;
        $update = $employee->save();
        if ($update) {
            $employees = Employee::all();
            $employeesCount = Employee::count();
            $admin = User::all();
            $adminCount = User::count();
            $manager = Manager::all();
            $managerCount = Manager::count();
            return redirect()->route('Admin.home')->with([
                'success' => 'Employee Updated Successfully',
                'employeesCount' => $employeesCount,
                'employees' => $employees,
                'admin' => $admin,
                'adminCount' => $adminCount,
                'manager' => $manager,
                'managerCount' => $managerCount
            ]);
        }
        return redirect()->route('Admin.home')->with('error', 'Error While Updating');
    }
}
