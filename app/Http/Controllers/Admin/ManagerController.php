<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manager;
use App\Models\Positon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        $managersCount = Manager::count();
        return view('Manager.index')->with([
            'managers' => $managers,
            'managersCount' => $managersCount
        ]);
    }
    public function addNew()
    {
        $positions = Positon::all();
        $positionCount = Positon::count();
        $manager = Manager::all();
        $managerCount = Manager::count();
        return view('Manager.addNew', compact('positions', 'positionCount', 'manager', 'managerCount'));
    }
    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'ssn' => 'required|unique:manager,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:manager,phone_number',
            'address' => 'required',
            'img' => 'required|image|max:2048|mimes:png,jpg,jpeg,webp,gif',
            'job_desc' => 'required',
            'status' => 'required',
            'duty_type' => 'required|in:full_time, part_time',
            'salary' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048'
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images/manager/');
            $img->move($destinationPath, $name);
        }
        if ($request->hasFile('pdf')) {
            $files = $request->file('pdf');
            $file_name = time() . '.' . $files->getClientOriginalExtension();
            $Path = public_path('files/');
            $files->move($Path, $file_name);
        }
        $store = Manager::create([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "ssn" => $request->ssn,
            "age" => $request->age,
            "address" => $request->address,
            "job_desc" => $request->job_desc,
            "status" => $request->status,
            "salary" => $request->salary,
            "img" => $name,
            "duty_type" => $request->duty_type,
            'position' => $request->position,
            'pdf' => $file_name
        ]);
        if ($store) {
            $managers = Manager::all();
            $managersCount = Manager::count();
            return view('Manager.index')->with([
                'success' => 'Manager Stored Successfully',
                'managers' => $managers,
                'managersCount' => $managersCount
            ]);
        }
        return redirect()->route('addnew')->withErrors($validator);
    }
    public function delete($id)
    {
        $manageer = Manager::find($id);
        if ($manageer) {
            $managers = Manager::all();
            $managersCount = Manager::count();
            if ($manageer->img !== null) {
                $oldImagePath = public_path('images/manager/' . $manageer->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            if ($manageer->pdf !== null) {
                $oldPdfPath = public_path('files/' . $manageer->pdf);
                if (file_exists($oldPdfPath)) {
                    unlink($oldPdfPath);
                }
            }
            $manageer->delete();
            return redirect()->route('Manager.index')->with([
                'success' => 'Manager Deleted Successfully',
                'managers' => $managers,
                'managersCount' => $managersCount
            ]);
        }
        return redirect()->route("Manager.index")->withErrors('Something Went Wrong While Deleting');
    }
    public function edit($id)
    {
        $edit = Manager::find($id);
        return view("Manager.edit", compact("edit"));
    }
    public function update(Request $request)
    {
        $manager = Manager::find($request->id);
        //! Delete Old Image
        if ($request->hasFile('img') && $manager->img !== null) {
            $oldImagePath = public_path('images/manager/' . $manager->img);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        //! Delete Old Pdf
        if ($request->hasFile('pdf') && $manager->pdf !== null) {
            $oldPdfPath = public_path('files/' . $manager->pdf);
            if (file_exists($oldPdfPath)) {
                unlink($oldPdfPath);
            }
        }
        //! Insert New Image
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $ManagerFile = $request->file('img');
            $name = time() . '.' . $ManagerFile->getClientOriginalExtension();
            $destinationPath = public_path('images/manager');
            $ManagerFile->move($destinationPath, $name);
            $manager->img = $name;
        }
        //! Insert New Pdf
        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $files = $request->file('pdf');
            $file_name = time() . '.' . $files->getClientOriginalExtension();
            $Path = public_path('files/');
            $files->move($Path, $file_name);
            $manager->pdf = $file_name;
        }
        //! Update User Data
        $manager->name = $request->name;
        $manager->phone_number = $request->phone_number;
        $manager->ssn = $request->ssn;
        $manager->age = $request->age;
        $manager->address = $request->address;
        $manager->job_desc = $request->job_desc;
        $manager->status = $request->status;
        $manager->salary = $request->salary;
        $update = $manager->save();
        if ($update) {
            $manager = Manager::all();
            $managerCount = Manager::count();
            return redirect()->route('Manager.index')->with([
                'success' => 'Manager Updated Successfully',
                'manager' => $manager,
                'managerCount' => $managerCount
            ]);
        }
        return redirect()->route('Manager.index')->with('error', 'Error While Updating');
    }
    public function profile($id)
    {
        $manager = Manager::find($id);
        return view('Manager.profile', compact('manager', 'department'));
    }
}
