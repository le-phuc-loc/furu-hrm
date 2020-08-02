@extends('role.worker.index')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-8">
                        <h1 class="mt-4">PROJECT *NAME*</h1>
                    </div>
                </div><br>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    {{ __('Report Project') }}
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        @csrf

                                        <form>
                                            <div class="form-group">
                                                <label for="project_name">Name User</label>
                                                <input type="text" class="form-control" id="project_name" readonly
                                                  value="{{ $report->project_user->user->name }}">
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label for="time_checkin">Time checkin</label>
                                                <input type="time" class="form-control" id="time_checkin" readonly
                                                    value="{{ $report->time_checkin }}">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="location_checkin">Location checkin</label>
                                                {{-- {{ dd($report->location_checkin) }} --}}
                                                <input type="text" class="form-control" id="location_checkin" readonly
                                                    value="{{ (isset($report->location_checkin)) ? $report->location_checkin->location_name : "" }}">
                                              </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="time_checkout">Time checkout</label>
                                                  <input type="time" class="form-control" id="time_checkout" readonly
                                                    value="{{ $report->time_checkout }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="location_checkout">Location checkout</label>
                                                  <input type="text" class="form-control" id="location_checkout" readonly
                                                    value="{{ (isset($report->location_checkout)) ? $report->location_checkout->location_name : ""}}">
                                                </div>
                                              </div>
                                            <div class="form-group">
                                              <label for="project_name">Project</label>
                                              <input type="text" class="form-control" id="project_name" readonly
                                                value="{{ $report->project_user->project->project_name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control"
                                                name="content" rows="5" readonly>
                                                    {{ $report->content }}
                                                </textarea>
                                            </div>

                                            @if ($report->state == 1)
                                                <div> Report is waiting for confirm </div>
                                            @elseif ($report->state == 2)
                                                <div> Report is allowed </div>
                                            @else
                                                <a type="button" href="{{ route('worker.report.send', ['id' => $report->id]) }}"
                                                    class="btn btn-primary">
                                                    Send
                                                </a>

                                                <a type="button" href="{{ route('worker.report.draw', ['id' => $report->id]) }}"
                                                    class="btn btn-primary">
                                                    Save but not send
                                                </a>


                                            @endif


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection
