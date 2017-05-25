<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Project;
use App\User;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function show($id){
//        $projectId = Project::findOrFail($id)->pluck('users_id')->first();
//        $departments = Department::where(function($q) use ($projectId){
//            $q->where('id',$projectId);
//        });
        $departments = Project::findOrFail($id)->departments;
        return view('project.show', compact('departments'));
    }

    public function create()
    {
        return view('project.add');
    }

    public function store(Request $r)
    {
        Project::create([
            'name' => $r->name,
            'users_id' => Auth::user()->id
        ]);
        return redirect('project');
    }

    public function edit($id){
        $project = Project::findOrFail($id);
        $employees = User::all();
        return view('project.edit',compact('project','employees'));
    }

    public function update($id, Request $r){
        $project = Project::findOrFail($id);
        $project->fill($r->all())->save();
        return redirect('project');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return back();
    }
}
