@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Projects Manager') }}
                    {{-- <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('project.create') }}>Create</a>
                    </button> --}}
                </div>

                <div class="card-body">


                    <div class="list-group col-md-12 ">
                        {{-- {{ dd($emp->titles) }} --}}
                        @if(count($projects) <= 0)
                            <div class="list-group-item list-group-item-action"> Don't have Projects </div>
                        @else
                        {{-- <div>adadasdasd</div> --}}

                            @foreach ($projects as $project)
                                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                    href={{ route('project.show', ['id' => $project->id]) }}>
                                    {{ $project->project_name }}

                                    <div class="">
                                        {{ $project->location->location_name }}
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
@endsection
