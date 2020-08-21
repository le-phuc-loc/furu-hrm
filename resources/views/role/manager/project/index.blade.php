
@extends('role.manager.layout')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <span>LIST PROJECTS</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="table-layout auto;width:100%" id="dataTable1"cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th >Manage by </th>
                            <th>From date</th>
                            <th>To date</th>
                            <th width="30%">Location</th>
                            <th width="20%">Action</th>
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
                                        <td> {{ $project->from_date }} </td>
                                        <td> {{ $project->to_date }} </td>
                                        <td style="width: 100px; height: 100%">
                                            <div style="overflow-y: scroll; height: 100px">
                                                {{ $project->location->location_name }}
                                            </div>
                                        </td>
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
