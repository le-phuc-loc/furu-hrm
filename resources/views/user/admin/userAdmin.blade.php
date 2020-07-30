@extends('layouts.admin_interface')

@section('content1')

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <h2 class="card-title">List of Users</h2>
                    <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#myModal"
                        style="float: right;"> <i class="fa fa-plus"></i>
                        Create
                    </button>
                </div>

                <!-- Modal Create-->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST" action="">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="user_name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                                        <div class="col-md-6">
                                            <input id="user_name" type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                name="user_name" value="{{ old('user_name') }}" required
                                                autocomplete="user_name" autofocus>

                                            @error('user_name')
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
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                        <div class="col-md-6">
                                            <select class="custom-select" id="role">
                                                <option selected>Choose...</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Worker</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="manager"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>
                                        <div class="col-md-6">
                                            <input type="number" id="manager" name="manager" min="0" max="100"
                                                class="form-control">
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

                <!-- TABLE -------->
                <!-- card body -->
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <!-- Update............... -->
                        {{-- <div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" >
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="updateLabel"> Update Infomation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="user-name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                                                <div class="col-md-6">
                                                    <input id="user-name" type="text"
                                                        class="form-control @error('user_name') is-invalid @enderror"
                                                        name="user_name" value="{{ old('user_name') }}" required
                                                        autocomplete="user_name" autofocus>

                                                    @error('user-name')
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
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="role"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                                <div class="col-md-6">
                                                    <select class="custom-select" id="role">
                                                        <option selected>Choose...</option>
                                                        <option value="1">Manager</option>
                                                        <option value="2">Worker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="manager"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>
                                                <div class="col-md-6">
                                                    <input type="number" id="manager" name="manager" min="0" max="100"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateUser" data-whatever="@sdkasasda">
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return confirm('Are you sure ????');">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>5</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateUser" data-whatever="@NgoHieu">
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return confirm('Are you sure ????');">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.5
                                    </td>
                                    <td>Win 95+</td>
                                    <td>5.5</td>
                                    <td>
                                        <input type="button" value="Update">
                                        <input type="button" value="Delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 6
                                    </td>
                                    <td>Win 98+</td>
                                    <td>6</td>
                                    <td>
                                        <input type="button" value="Update">
                                        <input type="button" value="Delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 7</td>
                                    <td>Win XP SP2+</td>
                                    <td>7</td>
                                    <td>
                                        <input type="button" value="Update">
                                        <input type="button" value="Delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>AOL browser (AOL desktop)</td>
                                    <td>Win XP</td>
                                    <td>6</td>
                                    <td>
                                        <input type="button" value="Update">
                                        <input type="button" value="Delete">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
