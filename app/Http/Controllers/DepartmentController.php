<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    public function show($id){
        $employees = Department::findOrFail($id)->childs;
        return view('department.show', compact('employees'));
    }

    public function create()
    {
        return view('department.add');
    }

    public function store(Request $r)
    {
        $department = new Department();
        $department->fill($r->all());
        $department->save();
        return redirect('department');
    }

    public function edit($id){
        $department = Department::findOrFail($id);
        return view('department.edit',compact('department'));
    }

    public function update($id, Request $r){
        $department = Department::findOrFail($id);
        $department->fill($r->all())->save();
        return redirect('department');
    }

    public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();
        return back();
    }
}
