@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Projects Manager') }}
                    <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('report.create') }}>Create</a>
                    </button>
                </div>

                <div class="card-body">

                    <form action="{{ route('report.checkin') }}" method="post">
                        <div class="project-name">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <label for="project-name"> Project name</label>
                            <input type="text" name="project_name" id="project-name" value="{{ $project->project_name }}">
                        </div>
                        <button type="submit"> <a href="">Checkin</a></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
