@extends('role.admin.layout')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <div class="dropdown">
                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    Choose project
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('admin.dashboard.working') }}">
                        All project
                    </a>
                    @if (count($projects) <= 0)
                        <a class="dropdown-item"> Don't have any project
                </div>
            @else
                @foreach ($projects as $project)
                    <a class="dropdown-item" href="{{ route('admin.dashboard.working', ['project_id' => $project->id]) }}">
                        {{ $project->project_name }}
                    </a>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Time working</th>
                    </tr>
                </thead>

                <tbody>


                    @if (count($users) <= 0)
                        <div class="list-group-item list-group-item-action"> Don't
                            have user
                        </div>
                    @else
                        {{-- {{ dd($users[7]->reports) }} --}}
                        {{-- {{ dd($users[7]->time_working(5)) }}
                        --}}
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                {{-- <td>
                                    {{ $user->absentApplication->pluck('number_off')->sum() }} </td>
                                --}}
                                {{-- <td> {{ $user->absentApplication() }}
                                </td> --}}
                                <td>
                                    {{ $user->time_working($project_id) }}
                                    {{-- {{ $user->reports->pluck('time_working')->sum() }}
                                    --}}

                                    {{-- {{ $user->reports->selectRaw }}
                                    --}}
                                </td>


                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>

    {{-- Reject --}}

    </div>
@endsection
