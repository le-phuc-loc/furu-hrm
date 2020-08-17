@extends('role.admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('PROJECT') }}
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('admin.project.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                <div class="col-md-6">
                                    <input id="project_name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                        value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>
                                    @error('project_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="managed"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Managed by') }}</label>
                                <div class="col-md-6">
                                    <input id="managed" type="text"
                                        class="form-control @error('managed') is-invalid @enderror" name="managed"
                                        value="{{ old('managed') }}" required autocomplete="managed" autofocus>
                                    @error('managed')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                <div class="col-md-6">
                                    <input type="number"
                                        class="form-control @error('number_worker') is-invalid @enderror"
                                        name="number_worker" min="1">
                                    @error('number_worker')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-from-date" type="date" class="form-control @error('from_date') is-invalid @enderror" name="from_date">
                                    @error('from_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project-to-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-to-date" type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date">
                                    @error('to_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>
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
                                    <input id="location-name" type="text" class="form-control controls" name="location_name"
                                        value="" placeholder="Enter place" required autofocus>

                                    <input type="hidden" id="lat" name="lat" step="any" class="form-control">
                                    <input type="hidden" id="lng" name="lng" step="any" class="form-control">
                                    <input type="hidden" id="place-id" name="place_id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group" id="map">

                            </div>
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
        </div>
    </div>
@endsection
