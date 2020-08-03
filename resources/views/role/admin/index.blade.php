@extends('layouts.side_bar')

@section('sidebar-menu')

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        Users
                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('admin.project.index') }}" class="nav-link ">
                    <i class="nav-icon fa fa-bars"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.absent.index')}} " class="nav-link ">
                    <i class="nav-icon fa fa fa-edit"> </i>
                    <p>
                        Absent
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.report.index')}} " class="nav-link ">
                    <i class="nav-icon fas fa-address-book"> </i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- CREATE PROJECT -->
    <div class="modal fade" id="modal-create-project" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.project.store') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

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
                            <label for="number"
                                class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="number"
                                    class="form-control @error('project_name') is-invalid @enderror"
                                    name="number_worker" min="1" >
                            </div>
                            @error('project_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="project-from-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                            <div class="col-md-6">
                                <input id="project-from-date" type="date" class="form-control"
                                    name="from_date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project-to-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                            <div class="col-md-6">
                                <input id="project-to-date" type="date" class="form-control"
                                    name="to_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="project-from-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                            <div class="col-md-6">
                                <input type="time" name="time_checkin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="project-from-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                            <div class="col-md-6">
                                <input type="time" name="time_checkout">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <input id="location-name" type="text"
                                    class="form-control controls"
                                    name="location_name" value=""
                                    placeholder="Enter place" required autofocus>

                                <input type="hidden" id="lat" name="lat" step="any" class="form-control">
                                <input type="hidden" id="lng" name="lng" step="any" class="form-control">
                                <input type="hidden" id="place-id" name="place_id" class="form-control">
                            </div>


                        </div>

                        <div class="form-group" id="map">

                        </div>




                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Create') }}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    {{-- Update Project --}}
    <div class="card-body">
        <form id="project-update-form" method="POST" action="">
            @csrf
            <div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
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
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            name="project_name" value="" required
                                            autocomplete="project_name" autofocus>

                                        @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="number"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number worker') }}</label>
                                    <div class="col-md-6">
                                        <input id="update-number-worker" type="number"
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            name="number_worker" min="1" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="update-from-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-from-date" type="date" class="form-control"
                                            name="from_date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="update-to-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-to-date" type="date" class="form-control"
                                            name="to_date">
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
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                    <div class="col-md-6">
                                        <input id="update-location-name" type="text"
                                            class="form-control"
                                            name="location_name" value="{{ old('location_name') }}" required
                                            autocomplete="project_name" autofocus>
                                        <input id="update-lat" name="lat" step="any" type="hidden"
                                            class="form-control">
                                        <input id="update-lng" name="lng" step="any" type="hidden"
                                            class="form-control">

                                        <input type="text" id="update-place-id" name="place_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="update-map">

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
