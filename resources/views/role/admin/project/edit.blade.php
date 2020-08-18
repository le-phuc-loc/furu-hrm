@extends('role.admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __(' EDIT PROJECT') }}
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('admin.project.update',['id'=>$project->id])}}">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                <div class="col-md-6">
                                    <input id="project_name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                        value="{{$project->project_name}}" required autocomplete="project_name" autofocus>

                                    @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="managed"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Managed_by') }}</label>
                                <div class="col-md-6">
                                    <input id="managed" type="text"
                                        class="form-control @error('managed') is-invalid @enderror" name="managed"
                                        value="{{$project->manager->name}}" required autocomplete="managed" autofocus readonly>

                                    @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="number"
                                        class="form-control @error('project_name') is-invalid @enderror" value="{{$project->number_worker}}"
                                        name="number_worker" min="1">
                                    @error('number_worker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-from-date" type="date" class="form-control" name="from_date" value="{{$project->from_date}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project-to-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-to-date" type="date" class="form-control" name="to_date" value="{{$project->to_date}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                <div class="col-md-6">
                                    <input type="time" class="form-control" name="time_checkin" value="{{$project->time_checkin}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                <div class="col-md-6">
                                    <input type="time" class="form-control" name="time_checkout" value="{{$project->time_checkout}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                <div class="col-md-6">
                                    <input id="location-name" type="text" class="form-control controls" name="location_name"
                                        value="{{$project->location->location_name}}" >

                                    <input type="hidden" id="lat" name="lat" step="any"
                                        value="{{ $project->location->lat }}"
                                        class="form-control">
                                    <input type="hidden" id="lng" name="lng" step="any"
                                        value="{{ $project->location->lng }}"
                                        class="form-control">
                                    <input type="hidden" id="place-id" name="place_id"
                                        value="{{ $project->location->place_id }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group" id="map">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Edit') }}
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initAutocomplete() {

            m_lat = $('#lat').val();
            m_lng = $('#lng').val();

            console.log(m_lat + "---" + m_lng);
            var position = new google.maps.LatLng(m_lat, m_lng);
            // confirm(m_lat + "-------" + m_lng);
            const map = new google.maps.Map(document.getElementById("map"), {
                center: position,
                zoom: 13,
                mapTypeId: "roadmap"
            }); // Create the search box and link it to the UI element.
            var input = document.getElementById("location-name");

            // confirm(state);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo("bounds", map);

            var marker = new google.maps.Marker({
                map: map
            });
            marker.setPosition(position);

            google.maps.event.addListener(autocomplete, "place_changed", function() {
                var place = autocomplete.getPlace();
                map.fitBounds(place.geometry.viewport);
                $("#lat").val(place.geometry.location.lat);
                $("#lng").val(place.geometry.location.lng);
                $("#location-name").val(place.formatted_address);
                $("#place-id").val(place.place_id);

                marker.setPosition(place.geometry.location);
            });

            google.maps.event.addListener(map, "click", function(event) {
                marker.setPosition(event.latLng);

                if (event.placeId) {

                    // confirm((event.placeId))

                    var request = {
                        placeId: event.placeId,
                        fields: ['formatted_address', 'geometry']
                    };

                    service = new google.maps.places.PlacesService(map);
                    service.getDetails(request, function(place, status) {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                            $("#lat").val(place.geometry.location.lat);
                            $("#lng").val(place.geometry.location.lng);
                            $("#location-name").val(place.formatted_address);
                            $("#place-id").val(event.placeId);

                        } else {
                            // confirm(status);
                        }
                    });


                } else {
                    $("#lat").val(event.latLng.lat);
                    $("#lng").val(event.latLng.lng);
                    $("#location-name").val("");
                    $("#place-id").val(event.placeId);


                }

            });

        }

    </script>
@endsection
