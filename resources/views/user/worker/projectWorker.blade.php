@extends('layouts.worker_interface')

@section('content2')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of project</h3>

                </div>

                <!-- INFORMATION PROJECT MODAL -->
                <!-- card body -->
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="modal fade" id="updateProject">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">"Name" Project</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="project_name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="project_name" type="text"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="project_name" value="{{ old('project_name') }}" required
                                                        autocomplete="project_name" autofocus>

                                                    @error('project_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="project_name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Manager by') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="name" value="{{ old('project_name') }}" required
                                                        autocomplete="project_name" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="number"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="number" min="1" max=" ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="project-from-date"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                                <div class="col-md-6">
                                                    <input id="project-from-date" type="date" class="form-control"
                                                        name="project_from_date">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="project-to-date"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                                <div class="col-md-6">
                                                    <input id="project-to-date" type="date" class="form-control"
                                                        name="project_to_date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="project-from-date"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                                <div class="col-md-6">
                                                    <input type="time" id="appt" name="appt">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="project-from-date"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                                <div class="col-md-6">
                                                    <input type="time" id="appt" name="appt">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                                <div class="col-md-6">
                                                    <input id="location_name" type="text"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="location_name" value="{{ old('location_name') }}" required
                                                        autocomplete="project_name" autofocus>
                                                    <p> lat </p>
                                                    <input id="lat" name="lat" step="any" type="number"
                                                        class="form-control">
                                                    <p> lng </p>
                                                    <input id="lng" name="lng" step="any" type="number"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>

                <!--REPORT MODAL -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Table -->
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th>Manager by</th>
                            <th>From date</th>
                            <th>From to</th>
                            <th>location</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  >
                            <div data-toggle="modal" data-target="#updateProject">
                           <td>Game</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                         </div>
                            <td><button>asdasd</button></td>
                        </tr>
                        <tr>
                            <td>Web</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>

                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
