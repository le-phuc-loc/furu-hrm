@extends('layouts.manager_interface')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-8">
                        <h1 class="mt-4">PROJECT *NAME*</h1>
                    </div>
                </div><br>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
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
                                                <input id="project_name" type="text" class="form-control"
                                                    name="project_name" value="" required autocomplete="project_name"
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value=""
                                                    required autocomplete="name" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="content"
                                                class="col-md-4 col-form-label text-md-right">Content</label>
                                            <div class="col-md-6">
                                                <input id="content" type="text" class="form-control" name="content" value=""
                                                    required autocomplete="content" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="datestare"
                                                class="col-md-4 col-form-label text-md-right">Day Off</label>
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
                                                    {{ __('Approve') }}
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#reject-modal">
                                                    Reject
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                        <input id="project_name" type="text" class="form-control"
                                            name="project_name" value="" required autocomplete="project_name"
                                            autofocus>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value=""
                                            required autocomplete="name" autofocus>
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
                                    <label for="content"
                                        class="col-md-4 col-form-label text-md-right">Reasons</label>
                                    <div class="col-md-6">
                                        <input id="content" type="text" class="form-control" name="content" value=""
                                            required autocomplete="content" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Date</label>
                                    <div class="col-md-6">
                                        <input id="Date" type="text" class="form-control" name="Date" value=""
                                            required autocomplete="Date" autofocus>
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
