@extends('layouts.manager_interface')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">PROJECT *NAME*</h1>
                    </div>
                </div><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Hieu2</td>
                                        <td>Hieu2@gmail.com</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#list-report" >
                                            Report
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#list-absent" >
                                            Absense form
                                        </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        {{-- list report  --}}
        <div class="modal fade" id="list-report" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Reports</h4>
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
                                            role="button">Detail</a>
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

        {{-- list absent  --}}
        <div class="modal fade" id="list-absent" tabindex="-1" role="dialog" aria-labelledby="updateLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Absense List</h4>
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
                                        <td><a class="btn btn-primary" href="{{ route('absentdetail') }}"
                                            role="button">Detail</a>
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
    </div>
@endsection
