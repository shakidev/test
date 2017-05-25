@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($employees as $employee)
                                <li class="list-group-item"><a
                                            href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a>
                                    ({{$employee->department->name}})
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
