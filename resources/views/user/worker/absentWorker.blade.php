@extends('layouts.worker_interface')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mt-4">List of absense Form</h3>
                    </div>
                </div>
                <br>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>List about 30 days
                        <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#create-modal"
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
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Project name</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#update-modal">
                                                Edit
                                            </button>
                                            <button class="btn btn-primary"
                                                onclick="return confirm('Are U sure !!');">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Create Absense form MODAL -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="project_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control" name="project_name" value=""
                                    required autocomplete="project_name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="" required
                                    autocomplete="content" autofocus style="padding: 2.375rem .75rem">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="status"
                                    class="form-control @error('project_name') is-invalid @enderror" name="status" min="1"
                                    max=" ">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="return confirm('Sending!!!!');">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- update absent form -->
        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="project_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control" name="project_name" value=""
                                    required autocomplete="project_name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="" required
                                    autocomplete="content" autofocus style="padding: 2.375rem .75rem">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="status"
                                    class="form-control @error('project_name') is-invalid @enderror" name="status" min="0"
                                    max="2">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="return confirm('Sending!!!!');">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
