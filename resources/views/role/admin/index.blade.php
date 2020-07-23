@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content">
                <div class="title m-b-md">
                    Admin
                </div>

                <div class="links">
                    <a href="{{ route('user_index') }}">User</a>
                    <a href="{{ route('user_index') }}">Project</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
