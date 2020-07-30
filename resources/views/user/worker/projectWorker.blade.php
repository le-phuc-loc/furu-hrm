@extends('layouts.worker_interface')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">List Project</h1>
                    </div>
                </div><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Manager by</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Manager by</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Location</th>
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
                                        <td><a class="btn btn-primary" href="{{ route('reportWorker') }}"
                                                role="button">Report</a>
                                                <a class="btn btn-primary" href="{{ route('absentWorker') }}"
                                                role="button">Absense</a>
                                            <button class="btn btn-primary">Checkin</button></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Absent Modal -->
        <div class="modal fade" id="absent-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absense Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="chưa có" required
                                    autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="chưa lun"
                                    required autocomplete="content" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="number" class="form-control @error('status') is-invalid @enderror"
                                    name="status" min="0" max="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="chưa nốt"
                                    required autocomplete="content" autofocus style="padding: 2.375rem .75rem">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="return confirm('Sending!!!!');">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
