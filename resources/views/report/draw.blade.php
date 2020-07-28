@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Report Manager') }}
                    {{-- <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('report.create', ['id' => $project->id]) }}>Create</a>
                    </button> --}}
                </div>

                <div class="card-body">

                    <div class="card-body">


                        <div class="list-group col-md-12 ">
                            {{-- {{ dd($emp->titles) }} --}}
                            @if(count($reports) <= 0)
                                <div class="list-group-item list-group-item-action"> Don't have Report draw </div>
                            @else
                            {{-- <div>adadasdasd</div> --}}

                                @foreach ($reports as $report)
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                        href={{ route('report.edit', ['report_id' => $report->id]) }}>
                                        Report {{ $report->project_user()->first()->project->project_name }}

                                        <div class="">
                                            {{ $report->created_at }}
                                        </div>
                                    </a>
                                @endforeach

                            @endif
                        <div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
