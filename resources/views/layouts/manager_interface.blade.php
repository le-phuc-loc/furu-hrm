<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- INFORMATION USER MODAL -->
        <div class="modal fade" id="update">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Infomation User</h4>
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
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

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
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control" name="role" value="worker"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="manager"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>
                                <div class="col-md-6">
                                    <input id="manager" type="text" class="form-control" name="manager" value="0"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Update') }}
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
        {{-- Edit Project --}}
        <div class="modal fade" id="updateProject" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
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
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Manager by') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror" name="name"
                                        value="{{ old('project_name') }}" required autocomplete="project_name"
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="number"
                                        class="form-control @error('project_name') is-invalid @enderror" name="number"
                                        min="1" max=" ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-from-date" type="date" class="form-control"
                                        name="project_from_date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project-to-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                <div class="col-md-6">
                                    <input id="project-to-date" type="date" class="form-control" name="project_to_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkin') }}</label>

                                <div class="col-md-6">
                                    <input type="time" id="appt" name="appt">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="project-from-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time checkout') }}</label>

                                <div class="col-md-6">
                                    <input type="time" id="appt" name="appt">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                <div class="col-md-6">
                                    <input id="location_name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror"
                                        name="location_name" value="{{ old('location_name') }}" required
                                        autocomplete="project_name" autofocus>
                                    <p> lat </p>
                                    <input id="lat" name="lat" step="any" type="number" class="form-control">
                                    <p> lng </p>
                                    <input id="lng" name="lng" step="any" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Update') }}
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
        {{-- list report  --}}
        <div class="modal fade" id="list-modal" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">List</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" action="">
                            @csrf

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>action tạm</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>action tạm</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>gà 48kg</td>
                                        <td>Ngày gữi Report</td>
                                        <td><a class="btn btn-primary" href="{{ route('reportdetail') }}"
                                            role="button">button</a>
                                    </tr>
                                </tbody>
                            </table>

                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        {{-- Reject  --}}
        <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="project_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                    <div class="col-md-6">
                                        <input id="project_name" type="text" class="form-control"
                                            name="project_name" value="" required autocomplete="project_name"
                                            autofocus>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value=""
                                            required autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="manager_by" class="col-md-4 col-form-label text-md-right">Manager by</label>
                                    <div class="col-md-6">
                                        <input id="manager_by" type="text" class="form-control" name="manager_by" value=""
                                            required autocomplete="manager_by" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content"
                                        class="col-md-4 col-form-label text-md-right">Reasons</label>
                                    <div class="col-md-6">
                                        <input id="content" type="text" class="form-control" name="content" value=""
                                            required autocomplete="content" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Date</label>
                                    <div class="col-md-6">
                                        <input id="Date" type="text" class="form-control" name="Date" value=""
                                            required autocomplete="Date" autofocus>
                                    </div>
                                </div>

                            </form>
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/worker2" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Welcome</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Manage</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#update">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Information

                                </p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projectManage') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Projects
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absent') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Absent
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reportlist') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Report
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->

        </aside>
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>

    </div>


    <!-- Content Wrapper. Contains page content -->




    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script >
    $(document).ready(function() {
        $('#dataTable').DataTable();
      });
    </script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"crossorigin="anonymous"/>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>
