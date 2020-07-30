@extends('layouts.manager_interface')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">List Project</h1>
                    </div>
                </div><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Manage by </th>
                                        <th>Number</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Manage by </th>
                                        <th>Number </th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#updateProject" data-whatever="@sdkasasda">
                                                Edit
                                            </button>
                                            <a class="btn btn-primary" href="{{ route('worker') }}"
                                                role="button">Workers</a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>



    </div>
@endsection
