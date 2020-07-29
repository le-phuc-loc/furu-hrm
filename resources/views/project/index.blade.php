@extends('role.admin.index')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of project</h3>
                    <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#myModal"
                        style="float: right;"> <i class="fa fa-plus"></i>
                        Create
                    </button>
                </div>

                <!-- CREATE PROJECT -->
                <div class="modal fade" id="myModal" >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create Project</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST" action="">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="project_name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                                        <div class="col-md-6">
                                            <input id="project_name" type="text"
                                                class="form-control @error('project_name') is-invalid @enderror"
                                                name="project_name" value="{{ old('project_name') }}" required
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
                                            class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="number"
                                                class="form-control @error('project_name') is-invalid @enderror"
                                                name="number_worker" min="1" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project-from-date"
                                            class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                        <div class="col-md-6">
                                            <input id="project-from-date" type="date" class="form-control"
                                                name="from_date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="project-to-date"
                                            class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                        <div class="col-md-6">
                                            <input id="project-to-date" type="date" class="form-control"
                                                name="to_date">
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
                                            <input id="location-name" type="text"
                                                class="form-control controls"
                                                name="location_name" value=""
                                                placeholder="Enter place" autofocus>

                                            <input type="hidden" id="lat" name="lat" step="any" type="number" class="form-control">
                                            <input type="hidden" id="lng" name="lng" step="any" type="number" class="form-control">

                                        </div>
                                        <div class="form-group" id="map" style="width: 100%; height: 200px;">

                                        </div>

                                    </div>



                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-secondary">
                                                {{ __('Create') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- card body -->
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
                                                        name="project_name" value="{{ old('project_name') }}" required
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
                                                    <input type="time" id="update-time-checkin" name="time-checkin">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="project-from-date"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                                <div class="col-md-6">
                                                    <input type="time" id="update-time-checkout" name="time-checkout">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                                <div class="col-md-6">
                                                    <input id="update-location-name" type="text"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="location_name" value="{{ old('location_name') }}" required
                                                        autocomplete="project_name" autofocus>
                                                    <p> lat </p>
                                                    <input id="update-lat" name="lat" step="any" type="number"
                                                        class="form-control">
                                                    <p> lng </p>
                                                    <input id="update-lng" name="lng" step="any" type="number"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-secondary">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Manager by</th>
                            <th>Number</th>
                            <th>From date</th>
                            <th>From to</th>
                            <th>Time checkin</th>
                            <th>Time checkout</th>
                            <th>location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($projects) <= 0)
                        <div class="list-group-item list-group-item-action"> Don't have Worker </div>
                        @else
                        {{-- <div>adadasdasd</div> --}}

                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->manager }}</td>
                                    <td>
                                        {{ $project->number_worker }}
                                    </td>
                                    <td> {{ $project->from_date }} </td>
                                    <td> {{ $project->to_date }} </td>
                                    <td> {{ $project->time_checkin }} </td>
                                    <td> {{ $project->time_checkout }} </td>
                                    <td> {{ $project->location->location_name }} </td>
                                    <td>
                                        <button class="btn btn-primary btn-project-edit" data-toggle="modal"
                                            data-target="#update-project"
                                            value="{{ route('project.edit', ['id' => $project->id]) }}">
                                            Edit
                                        </button>
                                        <a type="button" class="btn btn-primary btn-project-delete"
                                            href="{{ route('project.delete', ['id' => $project->id]) }}"
                                            onclick="return confirm('Are you sure ????');">
                                            Delete
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
    <script>
        $(document).ready(function(e) {
            $(".btn-project-edit").click(function(e) {
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
                        $("#project-update-form").attr('action', "/project/update/"+result.project.id);
                    }
                });
            });
        });
    </script>

    <script>
        function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: -33.8688,
            lng: 151.2195
          },
          zoom: 13,
          mapTypeId: "roadmap"
        }); // Create the search box and link it to the UI element.

        const input = document.getElementById("location-name");
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo("bounds", map);

        var marker = new google.maps.Marker({map: map});

        google.maps.event.addListener(autocomplete, "place_changed", function()
        {
            var place = autocomplete.getPlace();

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(15);
            }

            marker.setPosition(place.geometry.location);
            });

            google.maps.event.addListener(map, "click", function(event)
            {
                marker.setPosition(event.latLng);
        });

      }
    </script>
@endsection
