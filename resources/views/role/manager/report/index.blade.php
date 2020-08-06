@extends('role.manager.index')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mt-4">Report list</h3>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose project
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                @if (count($projects) <= 0)
                                    <div class="dropdown-item"> Manager do not manage any project </div>
                                @else
                                    @foreach ($projects as $project)
                                        <a class="dropdown-item" href="{{ route('manager.report.index', ['project_id' => $project->id]) }}">
                                            {{ $project->project_name }}
                                        </a>
                                    @endforeach
                                @endif
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
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if (count($reports) <= 0)
                                        <tr>
                                            <td>
                                                <div>
                                                    Don't have any reports
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($reports as $report)
                                            <tr>
                                                {{-- {{ dd($report->project_user->user) }} --}}
                                                <td>{{ $report->project_user->user->name  }}</td>
                                                <td>{{ $report->project_user->user->email }}</td>
                                                <td> {{ $report->content }}</td>
                                                <td>

                                                    @if ($report->state != 2)
                                                        <a type="button" href="{{ route('manager.report.approve', ['id' => $report->id, 'user_id' => $report->project_user->user->id]) }}"
                                                            class="btn btn-primary">
                                                            Approve
                                                        </a>
                                                        <button type="button" class="btn btn-primary btn-reject-report" data-toggle="modal"
                                                            data-target="#reject-modal"
                                                            data-project_name = "{{ $report->project_user->project->project_name }}"
                                                            data-name = "{{ $report->project_user->user->name }}"
                                                            data-manager = "{{ $report->project_user->project->managed }}"
                                                            data-user_id = "{{ $report->project_user->user->id }}"
                                                            data-report_id = "{{ $report->id }}"
                                                            >
                                                            Reject
                                                        </button>
                                                    @endif

                                                    <a class="btn btn-primary" href="{{ route('manager.report.info', ['id' => $report->id]) }}"
                                                        role="button">Detail</a>

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
        <!-- Creaete Absense MODAL -->
        {{-- Reject --}}
        <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-reject-report" method="POST" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">

                                    @csrf

                                    <div class="form-group row">
                                        <label for="project_name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                        <div class="col-md-6">
                                            <input id="reject-project-name" type="text" class="form-control" name="project_name"
                                                value="" required autocomplete="project_name" autofocus>


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input id="reject-name" type="text" class="form-control" name="name" value="" required
                                                autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="manager_by" class="col-md-4 col-form-label text-md-right">Manager by</label>
                                        <div class="col-md-6">
                                            <input id="reject-manager-by" type="text" class="form-control" name="manager_by" value=""
                                                required autocomplete="manager_by" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="content" class="col-md-4 col-form-label text-md-right">Reasons</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="content" rows="3"></textarea>
                                        </div>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                            </ul>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                $("#reject-project-name").val(button.data("project_name"));
                $("#reject-name").val(button.data("name"));
                $("#reject-manager-by").val(button.data("manager"));
                $("#form-reject-report").attr('action', '/manager/report/reject/'
                    + button.data("report_id") + "?user_id="
                    + button.data("user_id"));
            })
            $('.modal').modal({backdrop: 'static', keyboard: false, show: false});
            // $(".btn-reject-report").click(function(e) {
            //     // var updateUrl = $(this).val(button.data("project_name"));
            //     confirm(button.data("project_name"));

            // });
        })

    </script>
@endsection
