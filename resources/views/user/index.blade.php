@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('User Manager') }}
                    <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('user_create_form') }}>Create</a>
                    </button>
                </div>

                <div class="card-body">


                    <div class="list-group col-md-12 ">
                        {{-- {{ dd($emp->titles) }} --}}
                        @if(count($users) <= 0)
                            <div class="list-group-item list-group-item-action"> Don't have Worker </div>
                        @else
                        {{-- <div>adadasdasd</div> --}}

                            @foreach ($users as $user)
                                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                    href={{ route('user_show', ['id' => $user->id]) }}>
                                    {{ $user->name }} | {{ $user->email }}

                                    <div class="">
                                        {{ $user->role }}
                                    </div>
                                </a>
                            @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
