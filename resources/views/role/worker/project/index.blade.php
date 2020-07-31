@extends('role.worker.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mt-4">List Project</h1>
                </div>
            </div><br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Manage by </th>
                                    <th>Number</th>
                                    <th>From date</th>
                                    <th>To date</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($projects) <= 0)
                                    <tr>
                                        <td>
                                            <div> Don't have project </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td> {{ $project->project_name }} </td>
                                            <td> {{ $project->managed }} </td>
                                            <td> {{ $project->number_worker }} </td>
                                            <td> {{ $project->from_date }} </td>
                                            <td> {{ $project->to_date }} </td>
                                            <td> {{ $project->location->location_name }} </td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-project" data-toggle="modal"
                                                    data-target="#update-project"
                                                    value="{{ route('manager.project.edit', ['id' => $project->id]) }}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </button>
                                                <a class="btn btn-primary" href="{{ route('manager.user.index', ['project_id' => $project->id]) }}"
                                                    role="button">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- INFORMATION USER MODAL -->
    <div class="card-body">
        <form id="project-update-form" method="POST" action="">
            @csrf
            <div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Project</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">


                                <div class="form-group row">
                                    <label for="project_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                    <div class="col-md-6">
                                        <input id="update-project-name" type="text"
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            name="project_name" value="" required
                                            autocomplete="project_name" autofocus>

                                        @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="number"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number worker') }}</label>
                                    <div class="col-md-6">
                                        <input id="update-number-worker" type="number"
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            name="number_worker" min="1" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="update-from-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-from-date" type="date" class="form-control"
                                            name="from_date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="update-to-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-to-date" type="date" class="form-control"
                                            name="to_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="project-from-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                    <div class="col-md-6">
                                        <input type="time" id="update-time-checkin" name="time_checkin">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="project-from-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                    <div class="col-md-6">
                                        <input type="time" id="update-time-checkout" name="time_checkout">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                    <div class="col-md-6">
                                        <input id="update-location-name" type="text"
                                            class="form-control"
                                            name="location_name" value="{{ old('location_name') }}" required
                                            autocomplete="project_name" autofocus>
                                        <input id="update-lat" name="lat" step="any" type="hidden"
                                            class="form-control">
                                        <input id="update-lng" name="lng" step="any" type="hidden"
                                            class="form-control">

                                        <input type="text" id="update-place-id" name="place_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="update-map">

                                </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Update') }}
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <script>
        $(document).ready(function(e) {
            $('.modal').modal({backdrop: 'static', keyboard: false, show: false})
            $(".btn-edit-project").click(function(e) {
                var updateUrl = $(this).val();
                console.log(updateUrl);
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: updateUrl,
                    success:function(result) {

                        console.log(result.user);
                        $("#update-project-name").val(result.project.project_name);
                        $("#update-number-worker").val(result.project.number_worker);
                        $("#update-from-date").val(result.project.from_date);
                        $("#update-to-date").val(result.project.to_date);
                        $("#update-time-checkin").val(result.project.time_checkin);
                        $("#update-time-checkout").val(result.project.time_checkout);
                        $("#update-location-name").val(result.project.location.location_name);
                        $("#update-lat").val(result.project.location.lat);
                        $("#update-lng").val(result.project.location.lng);
                        $("#update-place-id").val(result.project.location.place_id);
                        $("#project-update-form").attr('action', "/manager/project/update/" + result.project.id);

                        initAutocomplete(result.project.location.lat, result.project.location.lng, "update-map", "update");
                    }
                });

            });

            $("#btn-create-project").on('click', function() {
                initAutocomplete(-33.8688, 151.2195, "map", "create")
            });



            function initAutocomplete(m_lat = -33.8688, m_lng=151.2195, map_id="map", state="create") {
                m_lat = parseFloat(m_lat);
                m_lng = parseFloat(m_lng);
                position = new google.maps.LatLng(m_lat, m_lng);
                // confirm(m_lat + "-------" + m_lng);
                const map = new google.maps.Map(document.getElementById(map_id), {
                center: position,
                zoom: 13,
                mapTypeId: "roadmap"
                }); // Create the search box and link it to the UI element.
                var input;
                if (state == "update") {
                    input = document.getElementById("update-location-name");
                }
                else {
                    input = document.getElementById("location-name");
                }

                // confirm(state);

                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo("bounds", map);

                var marker = new google.maps.Marker({map: map});
                marker.setPosition(position);

                google.maps.event.addListener(autocomplete, "place_changed", function()
                {
                    var place = autocomplete.getPlace();
                    map.fitBounds(place.geometry.viewport);
                    if (state == "update") {

                        $("#update-lat").val(place.geometry.location.lat);
                        $("#update-lng").val(place.geometry.location.lng);
                        $("#update-location-name").val(place.formatted_address);
                        $("#update-place-id").val(place.place_id);
                    }
                    else {

                        $("#lat").val(place.geometry.location.lat);
                        $("#lng").val(place.geometry.location.lng);
                        $("#location-name").val(place.formatted_address);
                        $("#place-id").val(place.place_id);
                    }

                    marker.setPosition(place.geometry.location);
                });

                google.maps.event.addListener(map, "click", function(event)
                {
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
                                // confirm(place.formatted_address);
                                if (state == "update"){

                                    $("#update-lat").val(place.geometry.location.lat);
                                    $("#update-lng").val(place.geometry.location.lng);
                                    $("#update-location-name").val(place.formatted_address);
                                    $("#update-place-id").val(event.placeId);
                                }
                                else {
                                    $("#lat").val(place.geometry.location.lat);
                                    $("#lng").val(place.geometry.location.lng);
                                    $("#location-name").val(place.formatted_address);
                                    $("#place-id").val(event.placeId);
                                }

                            }
                            else {
                                // confirm(status);
                            }
                        });


                    }
                    else {
                        if (state == "update") {
                            $("#update-lat").val(event.latLng.lat);
                            $("#update-lng").val(event.latLng.lng);
                            $("#update-location-name").val("");
                            $("#update-place-id").val(event.placeId);
                        }
                        else {
                            $("#lat").val(event.latLng.lat);
                            $("#lng").val(event.latLng.lng);
                            $("#location-name").val("");
                            $("#place-id").val(event.placeId);
                        }


                    }

                });

            }

        });


    </script>
@endsection
