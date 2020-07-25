@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Projects Manager') }}
                    <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('project_create') }}>Create</a>
                    </button>
                </div>

                <div class="card-body">


                    <button></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
