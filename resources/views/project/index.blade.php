@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Projects</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($projects as $project)
                                <li class="list-group-item">
                                    <div class="pull-left">
                                        <a href="{{ route('project.show', $project->id)}}">{{ $project->name }}</a>
                                    </div>
                                    <div class="pull-right">
                                        <div class="btn-groups">
                                            <a href="{{route('project.edit',$project->id)}}"
                                               class="btn btn-warning">Edit</a>
                                            <form class="form-inline" action="{{route('project.delete',$project->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="panel-footer">
                        <div class="pull-right">
                            <div class="col-md-6">
                                <a href="{{ route('project.create') }}" class="btn btn-success">Add</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
