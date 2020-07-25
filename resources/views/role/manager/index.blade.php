@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manager') }}</div>

                <div class="card-body">
                    <div class="links">
                        <a href="{{ route('user_index') }}">User</a>
                        <a href="{{ route('project_index') }}">Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
