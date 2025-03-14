<?php

namespace App\Http\Controllers\Deduction;

use App\Http\Controllers\Controller;
use App\Models\Deductions;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DeductionController extends Controller
{
    public function index()
    {
        $deductions = Deductions::all();
        $users = User::all();
        return view('pages.auth.deductions.index', compact('deductions', 'users'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee' => 'required',
            'code' => 'required|string|max:255',
            'deduction_type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
        try {
            Deductions::create([
                'employee_id' => $request->get('employee'),
                'code' => $request->get('code'),
                'deduction_type' => $request->get('deduction_type'),
                'description' => $request->get('description')
            ]);
            return response()->json(['message' => 'Deduction added successfully!'], 200);
        }catch (\Exception $e){
            return response()->json(['message' => 'An error occurred, please try again later.'], 500);
        }
    }
}
