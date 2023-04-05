<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Positon;
use Illuminate\Http\Request;

class PositionContrller extends Controller
{
    public function viewData()
    {
        $position = Positon::all();
        $count = Positon::count();
        return view('positions.show')->with([
            'position' => $position,
            'count' => $count
        ]);
    }
    public function store(Request $request)
    {
        $Validator = $request->validate([
            'name' => 'required|string',
        ]);
        $store = Positon::create([
            'name' => $request->name
        ]);
        if ($store) {
            return redirect()->route('positions.show')->with('success', 'Position Created Successfuly');
        }
        return redirect()->route('positions.addnew')->withErrors($Validator);
    }
    public function edit($id)
    {
        $edit = Positon::find($id);
        return view("positions.edit", compact("edit"));
    }
    public function delete($id)
    {
        $position = Positon::find($id);
        if ($position) {
            $position->delete();
            return redirect()->route('positions.show')->with('success', 'Manager Deleted Successfully');
        }
        return redirect()->route("positions.show")->withErrors('Something Went Wrong While Deleting');
    }
    public function update(Request $request)
    {
        dd($request);
    }
}
