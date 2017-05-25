<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $employees = User::all();
        return view('employee.index', compact('employees'));
    }

    public function show($id){
        $projects = User::findOrFail($id)->projects;
        return view('employee.show', compact('projects'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employee.add',compact('departments'));
    }

    public function store(Request $r)
    {
        User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make(rand(1,100)),
            'departments_id' => $r->departments_id
        ]);
        return back();
    }

    public function edit($id){
        $employee = User::findOrFail($id);
        $departments = Department::all();
        return view('employee.edit',compact('employee','departments'));
    }

    public function update($id, Request $r){
        $employees = User::findOrFail($id);
        $employees->fill($r->all())->save();
        return redirect('employee');
    }

    public function destroy($id){
        $employees = User::findOrFail($id);
        $employees->delete();
        return back();
    }
}
