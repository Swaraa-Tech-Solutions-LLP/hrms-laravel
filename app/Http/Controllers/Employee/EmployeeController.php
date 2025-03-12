<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Designations;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\Departments;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('pages.auth.employee.index');
    }
    public function create()
    {
        $departments = Departments::all();
        $clients = Clients::all();
        $locations = Locations::all();
        $designations = Designations::all();
        return view('pages.auth.employee.create',compact('departments','clients','locations','designations'));
    }
}
