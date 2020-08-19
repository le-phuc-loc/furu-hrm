@extends('role.worker.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('EDIT ABSENT FORM') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('worker.absent.update',['absent'=>$absent->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="create-name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                                        required autocomplete="name" autofocus readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datestart"
                                    class="col-md-4 col-form-label text-md-right">Date start</label>
                                <div class="col-md-6">
                                    <input id="datestart" type="date" class="form-control" name="date_off_start" value="{{$absent->date_off_start}}"
                                        required autocomplete="datestart" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateend"
                                    class="col-md-4 col-form-label text-md-right">Date end</label>
                                <div class="col-md-6">
                                    <input id="dateend" type="date" class="form-control" name="date_off_end" value="{{$absent->date_off_end}}"
                                        required autocomplete="dateend" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="content" rows="3"  >{{$absent->content}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
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
