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
                                <li class="list-group-item"><a href="{{ route('project.show', $project->id) }}">{{ $project->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
