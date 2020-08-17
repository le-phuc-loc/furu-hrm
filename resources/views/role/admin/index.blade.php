@extends('layouts.side_bar')
@section('sidebar-menu')

    <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="active">
                <a href="{{ route('admin.user.index') }}">
                    <span class="fa fa-user mr-3"></span>
                        Users
                </a>
            </li>

            <li class="active">
                <a href="{{route('admin.project.index')}}">
                    <i class="fa fa-tasks mr-3"></i>
                    <span>Project</span>
                </a>
                {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="active"><a href="{{route('admin.project.index')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul> --}}
            </li>
            <li class="active">
                <a href="{{ route('admin.absent.index') }}">
                    <span class="fa fa-home mr-3"></span>
                        Absents
                </a>
            </li>
            <li class="active">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="fa fa-home mr-3"></span>
                        Dashboard
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    <li class="active"><a href="{{route('admin.dashboard.working')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li class="active"><a href="{{route('admin.dashboard.absent')}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>

        </ul>

    </nav>
    <!-- CREATE PROJECT -->
    {{-- <div class="modal fade" id="modal-create-project">
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
                                    class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                    value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_worker"
                                class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                            <div class="col-md-6">
                                <input id="number_worker" type="number"
                                    class="form-control @error('number_worker') is-invalid @enderror"
                                    name="number_worker" min="1" >
                            </div>
                            @error('number_worker')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="from_date"
                                class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                            <div class="col-md-6">
                                <input id="from_date" type="date" class="form-control @error('from_date') is-invalid @enderror"
                                    name="from_date">
                            </div>
                            @error('from_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="project-to-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                            <div class="col-md-6">
                                <input id="project-to-date" type="date" class="form-control @error('to_date') is-invalid @enderror"
                                    name="to_date">
                            </div>
                            @error('to_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="project-from-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                            <div class="col-md-6">
                                <input type="time" name="time_checkin" class="form-control @error('time_checkin') is-invalid @enderror" name="time_checkin">
                            </div>
                            @error('time_checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="project-from-date"
                                class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                            <div class="col-md-6">
                                <input type="time" name="time_checkout" class="form-control @error('time_checkout') is-invalid @enderror" name="time_checkout">
                            </div>
                            @error('time_checkout')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <input id="location-name" type="text" class="form-control controls" name="location_name"
                                    value="" placeholder="Enter place" required autofocus>

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
    </div> --}}
    {{-- Update Project --}}
    {{-- <div class="card-body">
        <form id="project-update-form" method="POST" action="">
            @csrf
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
                                <label for="number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Number worker') }}</label>
                                <div class="col-md-6">
                                    <input id="update-number-worker" type="number"
                                        class="form-control @error('project_name') is-invalid @enderror"
                                        name="number_worker" min="1">
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
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
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
        </form>
    </div> --}}
    <style>
    a[data-toggle="collapse"] {
        position: relative;
    }
    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

          </style>
@endsection

