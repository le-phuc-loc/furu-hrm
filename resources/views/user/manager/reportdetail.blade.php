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
                                    {{ __('Report Project') }}
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
                                            <label for="time_checkin" class="col-md-4 col-form-label text-md-right">Time_checkin</label>
                                            <div class="col-md-6">
                                                <input id="time_checkin" type="text" class="form-control" name="time_checkin" value=""
                                                    required autocomplete="time_checkin" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="time_checkout" class="col-md-4 col-form-label text-md-right">Time_checkout</label>
                                            <div class="col-md-6">
                                                <input id="time_checkout" type="text" class="form-control" name="time_checkout" value=""
                                                    required autocomplete="time_checkout" autofocus>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label for="location_checkin" class="col-md-4 col-form-label text-md-right">Location_checkin</label>
                                                <div class="col-md-6">
                                                    <input id="location_checkin" type="text" class="form-control" name="location_checkin" value=""
                                                        required autocomplete="location_checkin" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="location_checkout" class="col-md-4 col-form-label text-md-right">Location_checkout</label>
                                                <div class="col-md-6">
                                                    <input id="location_checkout" type="text" class="form-control" name="location_checkout" value=""
                                                        required autocomplete="location_checkout" autofocus>
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
                                            <label for="content" class="col-md-4 col-form-label text-md-right">Date</label>
                                            <div class="col-md-6">
                                                <input id="Date" type="text" class="form-control" name="Date" value=""
                                                    required autocomplete="Date" autofocus>
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



    </div>
@endsection
