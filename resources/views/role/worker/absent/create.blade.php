@extends('role.worker.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('CREATE ABSENT FORM') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('worker.absent.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="create-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}"
                                        required autocomplete="name" autofocus readonly>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="datestart"
                                    class="col-md-4 col-form-label text-md-right">Date start</label>
                                <div class="col-md-6">
                                    <input id="datestart" type="date" class="form-control @error('date_off_start') is-invalid @enderror" name="date_off_start" value=""
                                        required autocomplete="datestart" autofocus>
                                    @error('date_off_start')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateend"
                                    class="col-md-4 col-form-label text-md-right">Date end</label>
                                <div class="col-md-6">
                                    <input id="dateend" type="date" class="form-control @error('date_off_end') is-invalid @enderror" name="date_off_end" value=""
                                        required autocomplete="dateend" autofocus>
                                    @error('date_off_end')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="3"></textarea>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>
                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
