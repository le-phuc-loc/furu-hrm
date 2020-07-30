@extends('role.manager.index')

@section('content')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

    </script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mt-4">List Absent</h3>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date Off</th>
                                        <th>Number days off</th>
                                        <th>Content</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date Off</th>
                                        <th>Number days off</th>
                                        <th>Content</th>
                                        <th>Created at</th>
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

                                        @if(count($absents) <= 0)
                                            <div class="list-group-item list-group-item-action"> Don't
                                                    have absent form
                                            </div>
                                        @else
                                            @foreach($absents as $absent)
                                                <tr>
                                                    <td>{{ $absent->user->name }}</td>
                                                    <td>{{ $absent->date_off }}</td>
                                                    <td>
                                                        {{ $absent->number_off }}
                                                    </td>
                                                    <td> {{ $absent->content }} </td>
                                                    <td> {{ $absent->created_at }} </td>

                                                    <td>
                                                        <button type="submit" class="btn btn-primary" onclick="confirm">
                                                            {{ __('Approve') }}
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#reject-modal">
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
        <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
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

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="" required
                                            autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="manager_by" class="col-md-4 col-form-label text-md-right">Manager by</label>
                                    <div class="col-md-6">
                                        <input id="manager_by" type="text" class="form-control" name="manager_by" value=""
                                            required autocomplete="manager_by" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Reasons</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="content" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Date</label>
                                    <div class="col-md-6">
                                        <input id="Date" type="text" class="form-control" name="Date" value="" required
                                            autocomplete="Date" autofocus>
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
