
@extends('role.admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <span>LIST</span>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable1">
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
                                            href="{{ route('admin.absent.approve', ['id' => $absent->id]) }}"
                                            class="btn btn-primary">
                                            <i class="fa fa-check" alt="Edit" aria-hidden="true"></i>
                                        </a>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-name="{{ $absent->user->name }}"
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


    <script>

        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                $("#reject-name").val(button.data("name"));
                $("#form-reject-report").attr('action', '/admin/absent/reject/' +
                    button.data("absent_id"));
            })

            $('.modal').modal({
                backdrop: 'static',
                keyboard: false,
                show: false
            });

        })

    </script>
    @section('script')

    @endsection


@endsection
