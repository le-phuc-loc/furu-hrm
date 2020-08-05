@extends('role.admin.index')

@section('content')
    {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

    </script> --}}
    <div id="layoutSidenav_content">
        <main>
           <p> Test= {{env('APP_NAME')}}</p>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">Dashboard</h1>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="dropdown">
                            <i class="fas fa-table mr-1"></i>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose project
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
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
                                        <th>Number days off</th>
                                        <th>Time working</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Number days off</th>
                                        <th>Time working</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    {{-- <tr>
                                        <td>acvas</td>
                                        <td>acvas</td>
                                        <td>acvas</td>
                                        <td>acvas</td>
                                        <td>acvas</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary" onclick="confirm">
                                                {{ __('Approve') }}
                                            </button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#reject-modal">
                                                Reject
                                            </button>
                                        </td>
                                    </tr> --}}

                                        @if(count($users) <= 0)
                                            <div class="list-group-item list-group-item-action"> Don't
                                                    have user
                                            </div>
                                        @else
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    {{ $user->role }}
                                                </td>
                                                <td></td>
                                                {{-- <td> {{ $user->absentApplication()}} </td> --}}
                                                <td></td>

                                                <td>
                                                    <button type="submit" class="btn btn-primary" onclick="confirm">
                                                        {{ __('Approve') }}
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#timework-modal">
                                                        Reject
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        {{-- Reject --}}
        <div class="modal fade" id="timework-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Time-Working</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="project_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                    <div class="col-md-6">
                                        <input id="project_name" type="text" class="form-control" name="project_name"
                                            value="" required autocomplete="project_name" autofocus>
                                    </div>
                                </div>



                            </form>
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
