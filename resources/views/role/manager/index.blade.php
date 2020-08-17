@extends('layouts.side_bar')

@section('sidebar-menu')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager.user.index') }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        User

                    </p>

                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manager.project.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-bars"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manager.absent.index') }}" class="nav-link">
                    <i class="nav-icon fa fa fa-edit"></i>
                    <p>
                        Absent
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manager.report.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Report
                    </p>
                </a>
            </li>
        </ul>

    </nav>
    <!-- INFORMATION PROJECT MODAL -->
    <div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">


                    <div class="form-group row">
                        <label for="project_name"
                            class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                        <div class="col-md-6">
                            <input id="update-project-name" type="text"
                                class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                value="" required autocomplete="project_name" autofocus>

                            @error('project_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number worker') }}</label>
                        <div class="col-md-6">
                            <input id="update-number-worker" type="number"
                                class="form-control @error('project_name') is-invalid @enderror" name="number_worker"
                                min="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="update-from-date"
                            class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                        <div class="col-md-6">
                            <input id="update-from-date" type="date" class="form-control" name="from_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="update-to-date"
                            class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                        <div class="col-md-6">
                            <input id="update-to-date" type="date" class="form-control" name="to_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="project-from-date"
                            class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                        <div class="col-md-6">
                            <input type="time" id="update-time-checkin" name="time_checkin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="project-from-date"
                            class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                        <div class="col-md-6">
                            <input type="time" id="update-time-checkout" name="time_checkout">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                        <div class="col-md-6">
                            <input id="update-location-name" type="text" class="form-control" name="location_name"
                                value="{{ old('location_name') }}" required autocomplete="project_name" autofocus>
                            <input id="update-lat" name="lat" step="any" type="hidden" class="form-control">
                            <input id="update-lng" name="lng" step="any" type="hidden" class="form-control">

                            <input type="text" id="update-place-id" name="place_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group" id="update-map">

                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Update') }}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Creaete Absense MODAL -->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Absense Form') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('manager.absent.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="create-name" type="text" class="form-control" name="name" value="" required
                                    autocomplete="name" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="datestare" class="col-md-4 col-form-label text-md-right">Day Off</label>
                            <div class="col-md-6">
                                <input id="datestart" type="date" class="form-control" name="date_off" value="" required
                                    autocomplete="datestart" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_off" class="col-md-4 col-form-label text-md-right">Number off</label>
                            <div class="col-md-6">
                                <input id="number_off" type="number" class="form-control" name="number_off" value=""
                                    required autocomplete="number_off" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
