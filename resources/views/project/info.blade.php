@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Project Info') }}
                    <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('project.create') }}>Create</a>
                    </button>
                </div>

                <div class="card-body">


                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('User name') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror"
                                name="project_name" value="{{ $project->project_name }}" required autocomplete="project_name" autofocus>

                                @error('User_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project-from-date" class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                            <div class="col-md-6">
                                <input id="project-from-date"  value="{{ $project->from_date }}" type="date" class="form-control"  name="project_from_date" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project-to-date" class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>
                            <div class="col-md-6">
                                <input id="project-to-date" value="{{ $project->to_date }}" type="date" class="form-control"  name="project-to-date" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location_name" type="text" class="form-control"  name="location_name"
                                value="{{ $project->location->location_name }}" required autofocus>
                                <p> lat </p>
                                <input id="lat" name="lat" value="{{ $project->location->lat }}" type="number" class="form-control">
                                <p> lng </p>
                                <input id="lng" name="lng" value="{{ $project->location->lng }}" type="number" class="form-control">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
