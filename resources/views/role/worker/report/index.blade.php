@extends('role.worker.index')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#create-modal"
                style="float: right;"> <i class="fa fa-plus"></i>
                Create
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Project name</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if (count($user->reports) <= 0)
                            <tr>
                                <td>
                                    <div>
                                        Don't have any reports
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($user->reports as $report)
                                <tr>
                                    {{-- {{ dd($report->project_user->user) }} --}}
                                    <td>{{ $report->project_user->user->name }}</td>
                                    <td>{{ $report->project_user->project->project_name }}</td>
                                    <td>{{ $report->content }}</td>
                                    <td>

                                        <a class="btn btn-primary" href="{{ route('worker.report.info', ['id' => $report->id]) }}"
                                            role="button">Detail</a>

                                        @if ($report->state == -1)
                                            <button class="btn btn-primary btn-checkout" value="{{ route('worker.report.checkout', ['id' => $report->id]) }}"
                                                role="button">Checkout</button>
                                        @elseif ($report->state == -2)
                                            <button class="btn btn-primary btn-checkin" value="{{ route('worker.report.checkin', ['id' => $report->id]) }}"
                                                role="button">Checkin </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{-- <div id="map" style="background-color: black"></div> --}}

            </div>
        </div>
    </div>

        <!-- Creaete REPORT MODAL -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('worker.report.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" id="manager-select" name="project_id">

                            @if (count($user->projects) <= 0)
                                <option class="project-manager disable" value="1">
                                    Don't have Project
                                </option>
                            @else

                                @foreach ($user->projects as $project)
                                    <option class="project-manager" value="{{ $project->id }}">
                                        {{ $project->project_name }}
                                    </option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit REPORT MODAL -->

        <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.

            $(".btn-checkin").click(function(e) {
                e.preventDefault();

                var url = $(this).val();
                // alert(url);
                if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    lat = position.coords.latitude;
                    lng = position.coords.longitude;
                    $('#lat').val(lat);
                    $('#lng').val(lng);
                    $.ajax({
                        type:'GET',
                        url: url,
                        data:{
                            lat:lat,
                            lng:lng
                        },
                        success:function(data){
                            location.reload();
                            alert(data.success);
                        }
                    });
                });
                // alert(lat);


                }
            });


            $(".btn-checkout").click(function(e) {
                e.preventDefault();

                var url = $(this).val();
                // alert(url);
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        lat = position.coords.latitude;
                        lng = position.coords.longitude;
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                        $.ajax({
                            type:'GET',
                            url: url,
                            data:{
                                lat:lat,
                                lng:lng
                            },
                            success:function(data){
                                location.reload();
                                alert(data.success);
                            }
                        });
                    });



                }
            });




          </script>


@endsection
