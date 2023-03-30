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
    }
    public function delete($id)
    {
    }
    public function update(Request $request)
    {
    }
}