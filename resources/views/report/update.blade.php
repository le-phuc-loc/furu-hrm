@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Report Update') }}
                    {{-- <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('report.create', ['id' => $project->id]) }}>Create</a>
                    </button> --}}
                </div>

                <div class="card-body">
                    {{-- {{ dd($report) }} --}}
                    <form action="{{ route('report.store', ['id' => $report->project_user()->first()->project->id, 'report_id'=>$report->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="location_name" value="meomeo">

                        <input type="number" hidden name="lat" id="lat" value=12>

                        <input type="number" hidden name="lng" id="lng" value=22>
                        <div class="project-name">
                            <label for="project-name"> Project name</label>
                            <input type="text" name="project_name" id="project-name" readonly value="{{ $report->project_user()->first()->project->project_name }}">
                        </div>
                        <div>
                            <label> Time checkin</label>
                            <input type="time" readonly value="{{ $report->time_checkin }}">
                        </div>
                        <div>
                            <label> Time check out</label>
                            <input type="time" readonly value="{{ $report->time_checkout }}">
                        </div>
                        <div>
                            <label> Content</label>
                            <input type="text" name="content" value={{ $report->content }}>
                        </div>
                        <button type="submit" name="action" value="store"> Store </button>
                        <button type="submit" name="action" value="review"> Review </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
