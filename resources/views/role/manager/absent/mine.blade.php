@extends('role.manager.layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <a type="button" class="btn btn-info add-new" href="{{ route('manager.absent.create')}}" style="float: right;"> <i class="fa fa-plus"></i>
                Create
            </a>
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

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                $("#reject-name").val(button.data("name"));
                $("#form-reject-report").attr('action', '/manager/absent/reject/' +
                    button.data("absent_id") + "?user_id=" +
                    button.data("user_id"));
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

    </script> --}}
@endsection
