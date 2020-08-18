@extends('role.worker.index')
@section('content')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });
    </script>
    <h2 class="mb-4">List User</h2>
    <div class="card mb-4">
        <!-- CREATE USER -->
                        <!-- Modal body -->
                       
        <!-- Update............... -->
        {{-- <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="updateLabel"> Update Infomation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="user-update-form" method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="update-name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="update-email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="update-password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" value="" required autocomplete="password" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            <!-- <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select class="custom-select" id="update-role" name="role">
                                        <option selected>Choose...</option>
                                        <option value="manager">Manager</option>
                                        <option value="worker">Worker</option>
                                    </select>
                                </div>
                            </div> -->

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>


                </div>
            </div>
        </div> --}}
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a type="button" class="btn btn-primary btn-user-edit"
                                    href="{{ route('worker.user.edit', ['id' => $user->id]) }}">
                                    <i class="fa fa-edit" style="color: white;" ></i>
                                </a>
                            </td>
                        </tr>

            </tbody>
        </table>
    </div>

    <script>
        // $(document).ready(function(e) {
            $(".btn-user-edit").click(function(e) {
                var updateUrl = $(this).val();
                console.log(updateUrl);
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: updateUrl,
                    success: function(result) {

                        console.log(result.user);
                        $("#update-name").val(result.user.name);
                        $("#update-email").val(result.user.email);
                        $("#update-password").val(result.user.password_hash);
                        $("#user-update-form").attr('action', "/worker/user/update/" + result
                            .user.id);
                    }
                });
            });
        });

    </script>
@endsection
