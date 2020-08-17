@extends('role.admin.index')

@section('content')
    <h2 class="mb-4">Absents</h2>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>List
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Date Off</th>
                    <th>Number days off</th>
                    <th>Content</th>
                    <th>Created at</th>
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
                            <td>{{ $absent->user->role }}</td>
                            <td>{{ $absent->date_off }}</td>
                            <td>
                                {{ $absent->number_off }}
                            </td>
                            <td> {{ $absent->content }} </td>
                            <td> {{ $absent->created_at }} </td>

                            <td>
                                @if ($absent->state == 2)
                                    Absent Application approved
                                @else
                                    <a type="button"
                                        href="{{ route('admin.absent.approve', ['id' => $absent->id, 'user_id' => $absent->user->id]) }}"
                                        class="btn btn-primary">
                                        <i class="fa fa-check" alt="Edit" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-name="{{ $absent->user->name }}" data-user_id="{{ $absent->user->id }}"
                                        data-absent_id="{{ $absent->id }}" data-target="#reject-modal">
                                        <i class="fa fa-ban" alt="Edit" aria-hidden="true"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Reject --}}
    <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                        rows="3"></textarea>
                                </div>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
    <!-- Create Absense MODAL -->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Absense Form') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="project_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control" name="project_name" value=""
                                    required autocomplete="project_name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required
                                    autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="" required
                                    autocomplete="content" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="datestare" class="col-md-4 col-form-label text-md-right">Day Off</label>
                            <div class="col-md-6">
                                <input id="datestart" type="text" class="form-control" name="datestart" value="" required
                                    autocomplete="datestart" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-at" class="col-md-4 col-form-label text-md-right">Create-at</label>
                            <div class="col-md-6">
                                <input id="create-at" type="text" class="form-control" name="create-at" value="" required
                                    autocomplete="create-at" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                $("#reject-name").val(button.data("name"));
                $("#form-reject-report").attr('action', '/admin/absent/reject/' +
                    button.data("absent_id") + "?user_id=" +
                    button.data("user_id"));
            })

            $('.modal').modal({
                backdrop: 'static',
                keyboard: false,
                show: false
            });

        })

    </script>
@endsection
