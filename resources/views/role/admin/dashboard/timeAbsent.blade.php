@extends('role.admin.layout')

@section('content')

    <div class="card mb-4">
        <div class="card-header row" style="margin-right: -1px; margin-left: -1px">
            <div class="dropdown mb-4" style="margin-right: 5px">
                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" >

                    Choose Month
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('admin.dashboard.absent') }}">
                        All month
                    </a>
                    @for ($i = 1; $i < 13; $i++)
                        <a class="dropdown-item" href="{{ route('admin.dashboard.absent', ['month' => $i]) }}">
                            {{ $i }}
                        </a>
                    @endfor
                </div>
            </div>
            <div class="dropdown mb-4">
                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    Choose Session
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('admin.dashboard.absent') }}">
                        All Session
                    </a>
                    @for ($j = 1; $j < 5; $j++)
                        <a class="dropdown-item" href="{{ route('admin.dashboard.absent', ['session' => $j]) }}">
                            {{ $j }}
                        </a>
                    @endfor

                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Time Absent</th>
                        </tr>
                    </thead>

                    <tbody>


                        @if (count($users) <= 0)
                            <div class="list-group-item list-group-item-action"> Don't
                                have user
                            </div>
                        @else
                            {{-- {{ dd($users[7]->absentApplication) }}
                            --}}
                            {{-- {{ dd($users[7]->time_absent()) }}
                            --}}
                            {{-- {{ dd($month) }} --}}
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
                                        {{ $user->time_absent($month, $session) }}
                                        {{--
                                        {{ $user->reports->pluck('time_working')->sum() }} --}}

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

@endsection
