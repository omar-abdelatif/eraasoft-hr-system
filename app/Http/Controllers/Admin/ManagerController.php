<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Support\Facades\View;

class ManagerController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $managers = DB::table('manager')->get();
        $managerCount = $managers->count();
        return view('Manager.index', compact('managers', 'managerCount'));
=======
        $managers = Manager::all();
        $managerCount = $managers->count();
        return redirect('managerlist', compact('managers', 'managerCount'));
>>>>>>> 65c70e37fcc47afc5badafcfd4f791372f2caeb9
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'ssn' => 'required|unique:manager,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:manager,phone_number',
            'address' => 'required',
            'img' => 'required|max:2048|mimes:jpeg,jpg,png,gif|image',
            'status' => 'required|in:Pending,Rejected,Approved',
            'salary' => 'required',
        ], [
            'img.max' => 'The uploaded image must be less than 2MB.',
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images/manager');
            $img->move($destinationPath, $name);
        }
        $store = DB::table('manager')->insert([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "ssn" => $request->ssn,
            "age" => $request->age,
            "address" => $request->address,
            "job_desc" => $request->job_desc,
            "status" => $request->status,
            "salary" => $request->salary,
            "img" => $name,
        ]);
        if ($store) {
            return view('Manager.index');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
    public function delete($id)
    {
        $manager = Manager::find($id);
        $delete = $manager->delete();
        if ($delete) {
            return View::make("Manager.index")->with('success', 'Employee Deleted Successfully');
        }
        return redirect("dashboard")->withErrors('Something Went Wrong While Deleting');
    }
    public function edit($id)
    {
        $edit = DB::table('manager')->find($id);
        return view("Manager.edit", compact("edit"));
    }
    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'ssn' => 'required|unique:manager,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:manager,phone_number',
            'address' => 'required',
            'img' => 'required|max:2048|mimes:jpeg,jpg,png,gif|image',
            'status' => 'required|in:Pending,Rejected,Approved',
            'salary' => 'required',
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images/manager');
            $img->move($destinationPath, $name);
        }
        $update = DB::table('manager')->where("id", $request->id)->update($request->except("id", "_token"));
        if ($update) {
            return view("Manager.index")->with('success', 'Manager Info Updated Successfully');
        }
        return redirect()->route('Manager.edit')->withErrors($validator);
    }
}
