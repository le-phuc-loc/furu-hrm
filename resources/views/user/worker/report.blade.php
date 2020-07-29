@extends('role.worker.index')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mt-4">List of Reports</h3>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>List about 30 days
                        <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#report-modal"
                            style="float: right;"> <i class="fa fa-plus"></i>
                            Create
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Project name</th>
                                        <th>Location</th>
                                        <th>Content</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Project name</th>
                                        <th>Location</th>
                                        <th>Content</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#report-modal"
                                                style="float: left;">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- REPORT MODAL -->
            <div class="modal fade" id="report-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                <div class="col-md-6">
                                    <input id="project_name" type="text" class="form-control" name="project_name"
                                        value="chưa có" required autocomplete="project_name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time_checkin"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                <div class="col-md-6">
                                    <input id="time_checkin" type="text" class="form-control" name="time_checkin"
                                        value="chưa lun" required autocomplete="time_checkin" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time_checkout"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                <div class="col-md-6">
                                    <input id="time_checkout" type="text" class="form-control" name="time_checkout"
                                        value="cũng chưa" required autocomplete="time_checkout" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content" value="chưa nốt"
                                        required autocomplete="content" autofocus style="padding: 2.375rem .75rem">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-primary"
                                onclick="return confirm('Sending!!!!');">Send</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
