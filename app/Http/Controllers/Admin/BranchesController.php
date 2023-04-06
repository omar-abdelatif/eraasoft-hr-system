<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\Manager;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $allBranches = Branches::all();
        $countBranches = Branches::count();
        return view('Branches.show', compact('allBranches', 'countBranches'));
    }
    public function addNew()
    {
        $manager = Manager::all();
        return view('Branches.addnew', compact('manager'));
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'manager_name' => 'required|string'
        ]);
        $store = Branches::create([
            "name" => $request->name,
            "location" => $request->location,
            "manager_name" => $request->manager_name
        ]);
        if ($store) {
            return redirect()->route('Branches.show')->with('success', 'Branche Stored Successfully');
        }
        return redirect()->route('Branche.addnew')->with($validator);
    }
    public function edit($id)
    {
        $manager = Manager::all();
        $branche = Branches::find($id);
        return view('Branches.edit', compact('branche', 'manager'));
    }
    public function destroy($id)
    {
        $branche = Branches::find($id);
        if ($branche) {
            $branche->delete();
            return redirect()->route('Branches.show')->with('success', 'Branche Deleted Successfully');
        }
        return redirect()->route('Branches.show')->with('error', 'Something Bad Happen');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $branche = Branches::find($id);
        $branche->name = $request->name;
        $branche->location = $request->location;
        $branche->manager_name = $request->manager_name;
        $update = $branche->save();
        if ($update) {
            return redirect()->route('Branches.show')->with('success', 'Branche Updated Successfully');
        }
        return redirect()->route('Branches.show')->with('error', 'Error While Updating');
    }
}
