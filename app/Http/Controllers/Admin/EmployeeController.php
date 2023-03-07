<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index(){
        return view('Employee.index');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ssn' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'img' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
            '' => 'required',
        ]);
        $store = DB::table('table_case')->insert($request->except('_token'));
        if ($store) {
            return redirect('home');
        }
        return redirect('addnew')->withErrors("حدث خطأ ما");
    }
}
?>
