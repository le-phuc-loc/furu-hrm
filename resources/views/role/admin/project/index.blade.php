@extends('role.admin.layout')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <span>LIST PROJECTS</span>
            <a type="button" class="btn btn-info add-new" href="{{ route('admin.project.create')}}" style="float: right;"> <i class="fa fa-plus"></i>
                Create
            </a>
        </div>
        <!-- CREATE PROJECT -->
        {{-- <div class="modal fade" id="modal-create-project">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Project</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.project.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                <div class="col-md-6">
                                    <input id="project_name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                        value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

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
                                        class="form-control @error('project_name') is-invalid @enderror"
                                        name="number_worker" min="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-from-date" type="date" class="form-control" name="from_date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project-to-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-to-date" type="date" class="form-control" name="to_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                <div class="col-md-6">
                                    <input type="time" name="time_checkin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                <div class="col-md-6">
                                    <input type="time" name="time_checkout">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                <div class="col-md-6">
                                    <input id="location-name" type="text" class="form-control controls" name="location_name"
                                        value="" placeholder="Enter place" required autofocus>

                                    <input type="hidden" id="lat" name="lat" step="any" class="form-control">
                                    <input type="hidden" id="lng" name="lng" step="any" class="form-control">
                                    <input type="hidden" id="place-id" name="place_id" class="form-control">
                                </div>


                            </div>

                            <div class="form-group" id="map">

                            </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Create') }}
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div>
        </div> --}}
        {{-- Update Project --}}
            {{-- <form id="project-update-form" method="POST" action="">
                @csrf
                <div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
                    aria-hidden="true">
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
                                            name="project_name" value="" required autocomplete="project_name" autofocus>

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
                                            name="number_worker" min="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="update-from-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-from-date" type="date" class="form-control" name="from_date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="update-to-date"
                                        class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-to-date" type="date" class="form-control" name="to_date">
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
                                        <input id="update-location-name" type="text" class="form-control"
                                            name="location_name" value="{{ old('location_name') }}" required
                                            autocomplete="project_name" autofocus>
                                        <input id="update-lat" name="lat" step="any" type="hidden" class="form-control">
                                        <input id="update-lng" name="lng" step="any" type="hidden" class="form-control">

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
            </form> --}}
        <div class="card-body">
            <table id="dataTable1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Manager by</th>
                        <th>Number</th>
                        <th>From date</th>
                        <th>From to</th>
                        <th width="30%">location</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($projects) <= 0)
                        <div class="list-group-item list-group-item-action"> Don't have Worker
                        </div>
                    @else
                        {{-- <div>adadasdasd</div> --}}

                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->managed }}</td>
                                <td>
                                    {{ $project->number_worker }}
                                </td>
                                <td> {{ $project->from_date }} </td>
                                <td> {{ $project->to_date }} </td>

                                <td style="width:100px; height:100px">
                                    <div class="scroll" >
                                        {{ $project->location->location_name }}
                                    </div>
                                </td>
                                <td class="d-flex">
                                    <a type="button" class="btn btn-primary btn-edit-project mr-2"
                                        href="{{ route('admin.project.edit', ['project' => $project->id]) }}">
                                        <i class="fa fa-edit" style="color:white" alt="Edit" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.project.destroy', ['project' => $project->id]) }}"
                                            class="mr-2"
                                            onclick="return confirm('Are you sure ????');"
                                            method="POST"
                                        >
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary btn-project-delete">

                                            <i class="fa fa-trash" alt="Delete" aria-hidden="true"></i>
                                        </button>
                                    </form>

                                    <a class="btn btn-primary btn-assign-project" role="button"
                                        href="{{ route('admin.project.assigned', ['id' => $project->id]) }}">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>

    </div>




    <script>
        function initAutocomplete() {

var position = new google.maps.LatLng(-33.8688, 151.2195);
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
