<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('Employee.index');
    }
    public function create(){
        echo"hello from the other side";
    }
}
?>
