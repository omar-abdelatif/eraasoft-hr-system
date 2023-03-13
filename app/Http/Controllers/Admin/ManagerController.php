<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ManagerController extends Controller
{
    public function index()
    {
        return view('Manager.index');
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
            'leader' => 'required',
            'status' => 'required',
            'salary' => 'required',
        ]);
        if (request()->hasFile('img')) {
            $img = request()->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $img->move($destinationPath, $name);
        }
        $store = DB::table('manager')->insert([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "ssn" => $request->ssn,
            "age" => $request->age,
            "address" => $request->address,
            "leader" => $request->leader,
            "status" => $request->status,
            "salary" => $request->salary,
            "img" => $name,
        ]);
        if ($store) {
            return redirect('dashboard');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
}
