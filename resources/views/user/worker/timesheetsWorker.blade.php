@extends('layouts.worker_interface')

@section('worker')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of project</h3>
                </div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            
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
                                                class="form-control @error('project_name') is-invalid @enderror"
                                                name="number" min="1" max=" ">
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
                                            <input id="project-to-date" type="date" class="form-control"
                                                name="project_to_date">
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


                <!-- card body -->
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="modal fade" id="updateProject">
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
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="name" value="{{ old('project_name') }}" required
                                                        autocomplete="project_name" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="number"
                                                        class="form-control @error('project_name') is-invalid @enderror"
                                                        name="number" min="1" max=" ">
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
                                                    <input id="project-to-date" type="date" class="form-control"
                                                        name="project_to_date">
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
                                                    <input id="lat" name="lat" step="any" type="number"
                                                        class="form-control">
                                                    <p> lng </p>
                                                    <input id="lng" name="lng" step="any" type="number"
                                                        class="form-control">
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
                </div>
                <table  id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr >
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Name</th>
                        <th rowspan="2" >Chức vụ và bộ phận</th>
                        <th colspan="31"><center>Ngày trong tháng</center></th>                                          
                        <th rowspan="2">Tổng Cộng</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                        <th>31</th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Game</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>
                        </tr>
                        <tr>
                            <td>Web</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>
                            <td>
                                

                            </td>
                        </tr>
                        <tr>
                            <td>Human</td>
                            <td>Internet
                                Explorer 5.5
                            </td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                           
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>

                            <td>
                              
                               
                            </td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 6
                            </td>
                            <td>Win 98+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>
                            <td>
                               
                            </td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>
                            <td>
                             
                            </td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>

                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td> 
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td> 4</td>
                            <td>130 </td>
                            <td>
                              
                               
                            </td>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection