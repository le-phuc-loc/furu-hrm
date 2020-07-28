@extends('layouts.worker_interface')

@section('content2')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group row">
                    <label for="user_name"
                        class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                    <div class="col-md-6">
                        <input id="user_name" type="text"
                            class="form-control @error('user_name') is-invalid @enderror"
                            name="user_name" value="{{ old('user_name') }}" required
                            autocomplete="user_name" autofocus>

                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- <beautify start="@foreach" end="@endforeach"
                    exp="^^$workers as $worker^^">

                    <li class="list-group-item">
                        <input type="checkbox" value="{{ $worker->id }}" name="workers[]"
                            id="workers-project">
                        {{ $worker->name }} - {{ $worker->role }}
                    </li>
                </beautify> --}}



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>
@endsection
