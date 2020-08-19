@extends('role.worker.index')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <span>LIST ABSENTS<span>
            <a type="button" class="btn btn-info add-new" href="{{ route('worker.absent.create')}}"
                style="float: right; color:white"> <i class="fa fa-plus"></i>
                Create
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Off</th>
                            <th>End off</th>
                            <th>Number days off</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($absents) <= 0)
                            <tr >
                                <td>Don't have absent form</td>
                            </tr>
                        @else
                            @foreach($absents as $absent)
                            <tr>
                                <td>{{ $absent->user->name }}</td>
                                <td>{{ $absent->date_off_start }}</td>
                                <td>{{ $absent->date_off_end }}</td>

                                <td>
                                    {{ $absent->number_off }}
                                </td>
                                <td> {{ $absent->content }} </td>

                                <td>
                                    {{-- @if ($absent->state == 2)
                                        Absent Application approved
                                    @else
                                        <a type="button"
                                        href="{{ route('manager.absent.approve', ['id' => $absent->id, 'user_id' => $absent->user->id]) }}"
                                        class="btn btn-primary">
                                            {{ __('Approve') }}
                                        </a>
                                        <button class="btn btn-primary"
                                            data-toggle="modal"
                                            data-name = "{{ $absent->user->name }}"
                                            data-user_id = "{{ $absent->user->id }}"
                                            data-absent_id = "{{ $absent->id }}"
                                            data-target="#reject-modal">
                                            Reject
                                        </button>
                                    @endif --}}
                                    <a type="button" class="btn btn-primary btn-edit-absent"
                                        href="{{ route('worker.absent.edit', ['id' => $absent->id]) }}">
                                    Edit
                                    </a>
                                    <a type="button" class="btn btn-primary btn-project-delete"
                                        href="{{ route('worker.absent.delete', ['id' => $absent->id]) }}"
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

        <!-- create Absense MODAL -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Absense Form') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('worker.absent.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="create-name" type="text" class="form-control" name="name" value=""
                                        required autocomplete="name" autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="datestare"
                                    class="col-md-4 col-form-label text-md-right">Day Off</label>
                                <div class="col-md-6">
                                    <input id="datestart" type="date" class="form-control" name="date_off" value=""
                                        required autocomplete="datestart" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_off"
                                    class="col-md-4 col-form-label text-md-right">Number off</label>
                                <div class="col-md-6">
                                    <input id="number_off" type="number" class="form-control" name="number_off" value=""
                                        required autocomplete="number_off" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="content" rows="3"></textarea>
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
    <!-- Update Absense MODAL -->
        <div class="modal fade" id="update-absent-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Absense Form') }}
                    </div>
                    <div class="card-body">
                        <form id="absent-update-form" method="POST" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="update-create-name" type="text" class="form-control" name="name" value=""
                                        required autocomplete="name" autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="datestare"
                                    class="col-md-4 col-form-label text-md-right">Day Off</label>
                                <div class="col-md-6">
                                    <input id="update-date-off" type="date" class="form-control" name="date_off" value=""
                                        required autocomplete="datestart" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_off"
                                    class="col-md-4 col-form-label text-md-right">Number off</label>
                                <div class="col-md-6">
                                    <input id="update-number-off" type="number" class="form-control" name="number_off" value=""
                                        required autocomplete="number_off" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <textarea id="update-content" class="form-control" name="content" rows="3"></textarea>
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
    {{-- <script>
        $(document).ready(function() {
            $('#create-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                $("#create-name").val(button.data("name"));
            })
            $('.modal').modal({backdrop: 'static', keyboard: false, show: false});
            $(".btn-edit-absent").click(function(e) {
                var updateUrl = $(this).val();
                console.log(updateUrl);
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: updateUrl,
                    success: function(result) {

                        console.log(result.absent);
                        $("#update-create-name").val(result.absent.user.name);
                        $("#update-content").val(result.absent.content);
                        $("#update-date-off").val(result.absent.date_off);
                        $("#update-number-off").val(result.absent.number_off);
                        $("#absent-update-form").attr('action', "/worker/absent/update/" +
                            result.absent.id);

                    }
                });

            });
        })
    </script> --}}
@endsection
