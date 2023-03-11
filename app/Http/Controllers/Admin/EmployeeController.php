<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    // use
    public function index(){
        return view('Employee.index');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ssn' => 'required|unique:table_case,ssn',
            'age' => 'required',
            'phone_number' => 'required|unique:table_case,phone_number',
            'address' => 'required',
            'img' => 'required',
            'pastjob' => 'required',
            'leader' => 'required',
            'job_desc' => 'required',
            'status' => 'required',
            'salary' => 'required',
        ]);
        $store = DB::table('table_case')->insert($request->except('_token'));
        if ($store) {
            return redirect('home');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
}
?>
