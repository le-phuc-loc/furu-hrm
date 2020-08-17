@extends('role.admin.index')

@section('content')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <!-- <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

    </script> -->
        <!-- <script> -->
            <!-- // $(document).ready(function()){
            //     $('.input-daterange').datepicker ({
            //         todayBtn:'linked',
            //     format:'yyyy-mm-dd',
            //     autoclose:true
            // });
            // load_data();
            // function load_data(to_date = '')
            // {
            //     $('#dataTable1').DataTable({
            //         processing:true,
            //         serverSide:true,
            //         ajax: {
            //             url:{{ route('admin.report.index') }},
            //             data:{to_date:to_date}
            //         },
            //         colums:[
            //             {
            //                 date:'id',
            //                 name:'id'
            //             },
            //             {
            //                 data:'name',
            //                 name:'name'
            //             },
            //             {
            //                 data:'email',
            //                 name:'email'
            //             },
            //             {
            //                 data:'role',
            //                 name:'role'
            //             },
                            {
            //                 data:'number_off',
            //                 name:'number_off'
            //             },
                           {
            //                 data:'time_working',
            //                 name:'time_working'
            //             },
                 
                    
            //         ]
            //     }
            // }
            // $('#filter').click(function() {
            //     var to_date =$('#to_date').val();
            //     if(to_date !='')
            //     {
            //         $('#dataTable1').DataTable().destroy();
            //         load_data(to_date);
            //     }
            //     else
            //     {
            //         alert('Both Date is required');
            //     }
            // });
            // $('#refresh').click(function(){
            //     $('#to_date').val('');
            //     $('#dataTable1').DataTable().destroy();
            //     load_data();
            // });
        }); 
</script> -->
<script>
        $(document).ready(function(){
        $("#bdaymonth").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTable1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
</script>
<script>
        $(document).ready(function(){
        $("#to_date1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTable1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
</script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">Dashboard</h1>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose project
                            </button>             
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (count($projects) <= 0)
                                    <a class="dropdown-item"> Don't have any project </div>
                                @else
                                    @foreach ($projects as $project)
                                        <a class="dropdown-item"
                                            href="{{ route('admin.report.index', ['project_id' => $project->id]) }}">
                                            {{ $project->project_name }}
                                        </a>
                                    @endforeach
                                @endif

                            </div>                        
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive"> 
                            <div class="row input-daterange">
                                <div class="col-md-4">
                                <input type="month" id="bdaymonth" name="bdaymonth">
                                </div>  
                                <div class="col-md-4">
                                    <input type="text" name="to_date" id="to_date1" class="form-control" placeholder="many 3months off" x />
                                </div>  
                            </div>    
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Number days off</th>
                                        <th>Time working</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @if (count($users) <= 0)
                                        <div class="list-group-item list-group-item-action"> Don't
                                            have user
                                        </div>
                                    @else
                                        {{-- {{ dd($users->find(9)->absentApplication) }}
                                        --}}
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    {{ $user->role }}
                                                </td>
                                                <td> {{ $user->absentApplication->pluck('number_off')->sum() }} </td>
                                                {{-- <td> {{ $user->absentApplication() }}
                                                </td> --}}
                                                <td>
                                                    {{ $user->reports->pluck('time_working')->sum() }}
                                                    {{-- {{ $user->reports->selectRaw }}
                                                    --}}
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
        </main>
        {{-- Reject --}}
        <div class="modal fade" id="timework-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Time-Working</h5>
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
                                        <input id="project_name" type="text" class="form-control" name="project_name"
                                            value="" required autocomplete="project_name" autofocus>
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
    </div>
@endsection


