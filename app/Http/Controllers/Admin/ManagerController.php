<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ManagerController extends Controller
{
    public function viewData()
    {
        $manager = DB::table('manager')->get();
        $managerCount = $manager->count();
        return View::make('Admin.home', compact('manager', 'managerCount'));
    }
    public function index()
    {
        return view('Managers.index');
    }

}
