
@extends('role.admin.index')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mt-4">List Users</h1>
                </div>
            </div>
            <br>
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>List
                    <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#create-user"
                        style="float: right;"> <i class="fa fa-plus"></i>
                        Create
                    </button>
                </div>

                <!-- Modal Create-->
                <div class="modal fade" id="create-user">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('admin.user.store') }}">
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Create User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                            <!-- Modal body -->
                                <div class="modal-body">

                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
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
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="role"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                        <div class="col-md-6">
                                            <select class="custom-select" id="role" name="role">
                                                <option selected>Choose...</option>
                                                <option value="manager">Manager</option>
                                                <option value="worker">Worker</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                            <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary">Create</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABLE -------->
                <!-- card body -->
                <div class="card-body">
                        @csrf
                        <!-- Update............... -->
                        <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" >
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
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                                <div class="col-md-6">
                                                    <input id="update-email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="role"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                                <div class="col-md-6">
                                                    <select class="custom-select" id="update-role" name="role">
                                                        <option selected>Choose...</option>
                                                        <option value="manager">Manager</option>
                                                        <option value="worker">Worker</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Manager By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) <= 0)
                                <div class="list-group-item list-group-item-action"> Don't have Worker </div>
                                @else
                                {{-- <div>adadasdasd</div> --}}

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td> {{ $user->role }} </td>
                                            <td> {{ $user->manager }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-user-edit" data-toggle="modal"
                                                    data-target="#update-user"
                                                    value="{{ route('admin.user.edit', ['id' => $user->id]) }}">
                                                    Edit
                                                </button>
                                                <a type="button" class="btn btn-primary btn-user-delete"
                                                    href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
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
            $(".btn-user-edit").click(function(e) {
                var updateUrl = $(this).val();
                console.log(updateUrl);
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: updateUrl,
                    success:function(result) {

                        console.log(result.user);
                        $("#update-name").val(result.user.name);
                        $("#update-email").val(result.user.email);
                        $("#update-manager").val(result.user.manager);
                        $("#update-role").val(result.user.role);
                        $("#user-update-form").attr('action', "/admin/user/update/"+result.user.id);
                    }
                });
            });
        });
    </script>
@endsection
