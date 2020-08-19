@extends('role.manager.index')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <span>WORKERS</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start off</th>
                            <th>End off</th>
                            {{-- <th>Number days off</th> --}}
                            <th>Content</th>

                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($absents) <= 0)
                            <div class="list-group-item list-group-item-action"> Don't
                                have absent form
                            </div>
                        @else
                            @foreach ($absents as $absent)
                                <tr>
                                    <td>{{ $absent->user->name }}</td>
                                    <td>{{ $absent->date_off_start }}</td>
                                    <td>
                                        {{ $absent->date_off_end }}
                                    </td>
                                    <td> {{ $absent->content }} </td>

                                    <td>
                                        @if ($absent->state == 2)
                                            Absent Application approved
                                        @else
                                            <a type="button"
                                                href="{{ route('manager.absent.approve', ['id' => $absent->id]) }}"
                                                class="btn btn-primary">
                                                {{ __('Approve') }}
                                            </a>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-name="{{ $absent->user->name }}"
                                                data-absent_id="{{ $absent->id }}" data-target="#reject-modal">
                                                Reject
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Reject --}}
    <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-reject-report" method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">

                            @csrf



                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="reject-name" type="text" class="form-control" name="name" value="" required
                                        autocomplete="name" autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Reasons</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="content" rows="3"></textarea>
                                </div>
                            </div>



                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Creaete Absense MODAL -->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Absense Form') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('manager.absent.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="create-name" type="text" class="form-control" name="name" value="" required
                                    autocomplete="name" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="datestare" class="col-md-4 col-form-label text-md-right">Day Off</label>
                            <div class="col-md-6">
                                <input id="datestart" type="date" class="form-control" name="date_off" value="" required
                                    autocomplete="datestart" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_off" class="col-md-4 col-form-label text-md-right">Number off</label>
                            <div class="col-md-6">
                                <input id="number_off" type="number" class="form-control" name="number_off" value=""
                                    required autocomplete="number_off" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
    <script>
        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                $("#reject-name").val(button.data("name"));
                $("#form-reject-report").attr('action', '/manager/absent/reject/' +
                    button.data("absent_id"));
            })

            $('#create-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                $("#create-name").val(button.data("name"));

            })
            $('.modal').modal({
                backdrop: 'static',
                keyboard: false,
                show: false
            });

        })

    </script>
@endsection
