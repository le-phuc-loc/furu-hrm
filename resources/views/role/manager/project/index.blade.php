
@extends('role.manager.layout')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <span>LIST PROJECTS</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Manage by </th>
                            <th>Number</th>
                            <th>From date</th>
                            <th>To date</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($projects) <= 0) <tr>
                                <td>
                                    <div> Don't have project </div>
                                </td>
                                </tr>
                            @else
                                @foreach($projects as $project)
                                    <tr>
                                        <td> {{ $project->project_name }} </td>
                                        <td> {{ $project->managed }} </td>
                                        <td> {{ $project->number_worker }} </td>
                                        <td> {{ $project->from_date }} </td>
                                        <td> {{ $project->to_date }} </td>
                                        <td> {{ $project->location->location_name }} </td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-edit-project"
                                                href="{{ route('manager.project.edit', ['project' => $project->id]) }}">
                                                Edit
                                            </a>
                                            <a class="btn btn-primary"
                                                href="{{ route('manager.user.index', ['project_id' => $project->id]) }}"
                                                role="button">
                                                {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
                                            Workers
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
