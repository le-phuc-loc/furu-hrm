@extends('role.worker.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Report Project') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('worker.report.sendOrDraw', ['id' => $report->id]) }}">
                            @csrf

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
                                        <label for="time_checkout">Time checkout</label>
                                        <input type="time" class="form-control" id="time_checkout" readonly
                                        value="{{ $report->time_checkout }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="location_checkin">Location checkin</label>
                                        {{-- {{ dd($report->location_checkin) }} --}}
                                        <input type="text" class="form-control" id="location_checkin" readonly
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->location_name : "" }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="location_checkout">Location checkout</label>
                                        <input type="text" class="form-control" id="location_checkout" readonly
                                        value="{{ (isset($report->location_checkout)) ? $report->location_checkout->location_name : ""}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" id="lat-checkin"
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->lat : "" }}">
                                        <input type="hidden" id="lng-checkin"
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->lng : "" }}">
                                        <div id="map-checkin" class="map"></div>
                                        {{-- {{ dd($report->location_checkin) }} --}}
                                        </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" id="lat-checkout"
                                            value="{{ (isset($report->location_checkout)) ? $report->location_checkout->lat : "" }}">
                                        <input type="hidden" id="lng-checkout"
                                            value="{{ (isset($report->location_checkout)) ? $report->location_checkout->lng : "" }}">
                                        <div id="map-checkout" class="map"></div>
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
                                    name="content" rows="5">
                                        {{ $report->content }}
                                    </textarea>
                                </div>

                                @if ($report->state == 1)
                                    <div> Report is waiting for confirm </div>
                                @elseif ($report->state == 2)
                                    <div> Report is allowed </div>
                                @else
                                    <button type="submit" name="action" value="send"
                                        class="btn btn-primary">
                                        Send
                                    </button>

                                    <button type="submit" name="action" value="draw"
                                        class="btn btn-primary">
                                        Save but not send
                                    </button>


                                @endif


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function initAutocomplete() {
            var lat_checkin = parseFloat($('#lat-checkin').val());
            var lng_checkin = parseFloat($('#lng-checkin').val());
            var lat_checkout = parseFloat($('#lat-checkout').val());
            var lng_checkout = parseFloat($('#lng-checkout').val());

            var position_checkin = new google.maps.LatLng(lat_checkin, lng_checkin);
            var position_checkout = new google.maps.LatLng(lat_checkout, lng_checkout);
            // confirm(m_lat + "-------" + m_lng);
            const map_checkin = new google.maps.Map(document.getElementById("map-checkin"), {
                center: position_checkin,
                zoom: 13,
                // mapTypeId: "roadmap"
            });

            var marker_checkin = new google.maps.Marker({
                position: position_checkin,
                map: map_checkin
            });

            const map_checkout = new google.maps.Map(document.getElementById("map-checkout"), {
                center: position_checkout,
                zoom: 13,
                // mapTypeId: "roadmap"
            });

            var marker_checkout = new google.maps.Marker({
                position: position_checkout,
                map: map_checkout
            });



        }

    </script>

@endsection
