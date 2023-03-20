<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        $managerCount = $managers->count();
        return redirect('managerlist', compact('managers', 'managerCount'));
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
        if ($request->hasFile('img')) {
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
