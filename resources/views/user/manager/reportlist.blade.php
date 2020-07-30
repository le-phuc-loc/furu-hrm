@extends('layouts.manager_interface')

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
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
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
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button class="btn btn-primary" onclick="return confirm('Sending mail');">Approve</button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#reject-modal">
                                                Reject
                                            </button>
                                            <a class="btn btn-primary" href="{{ route('reportdetail') }}"
                                                role="button">Detail</a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Creaete Absense MODAL -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Absense Form') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                <div class="col-md-6">
                                    <input id="project_name" type="text" class="form-control" name="project_name" value=""
                                        required autocomplete="project_name" autofocus>
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
                                <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content" value="" required
                                        autocomplete="content" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datestare" class="col-md-4 col-form-label text-md-right">Day Off</label>
                                <div class="col-md-6">
                                    <input id="datestart" type="text" class="form-control" name="datestart" value=""
                                        required autocomplete="datestart" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="create-at" class="col-md-4 col-form-label text-md-right">Create-at</label>
                                <div class="col-md-6">
                                    <input id="create-at" type="text" class="form-control" name="create-at" value=""
                                        required autocomplete="create-at" autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit REPORT MODAL -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Absense Form') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                <div class="col-md-6">
                                    <input id="project_name" type="text" class="form-control" name="project_name" value=""
                                        required autocomplete="project_name" autofocus>
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
                                <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content" value="" required
                                        autocomplete="content" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datestare" class="col-md-4 col-form-label text-md-right">Day Off</label>
                                <div class="col-md-6">
                                    <input id="datestart" type="text" class="form-control" name="datestart" value=""
                                        required autocomplete="datestart" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="create-at" class="col-md-4 col-form-label text-md-right">Create-at</label>
                                <div class="col-md-6">
                                    <input id="create-at" type="text" class="form-control" name="create-at" value=""
                                        required autocomplete="create-at" autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
