@extends('role.admin.index')

@section('content')
    <div class="container">

        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Assigned worker in Project') }}
                        <a type="button" class="btn btn-primary"
                            href="{{ route('admin.project.assign', ['id' => $project->id]) }}">
                            {{ __('Assign') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="project_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control" name="project_name"
                                    value="{{ $project->project_name }}" required autocomplete="project_name" autofocus
                                    readonly>
                            </div>
                            {{-- {{ dd($project->manager->name) }} --}}
                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label>
                                <div class="col-md-6">
                                    {{-- {{dd($project->manager->name)}} --}}
                                    <input class="form-control" type="text" value="{{ $project->manager->name }}" >
                                    <input type="hidden" name="manager" value="{{ $project->manager->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manager-select" class="col-md-4 col-form-label text-md-right">Worker
                                select</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Choose worker
                                </button>
                            </div>
                          <!-- Modal -->

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">List Workers</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                {{-- <beautify start="@foreach" end="@endforeach"
                                                    exp="^^$workers as $worker^^">

                                                    <li class="list-group-item">
                                                        <input type="checkbox" value="{{ $worker->id }}" name="workers[]"
                                                            id="workers-project">
                                                        {{ $worker->name }} - {{ $worker->role }}
                                                    </li>
                                                </beautify> --}}

                                                @if (count($workers) <= 0)
                                                    Don't have worker
                                                @else
                                                    @foreach ($workers as $worker)
                                                        <li class="list-group-item">
                                                            {{ $worker->name }} - {{ $worker->role }}

                                                            <a href="{{ route('admin.project.deleteAssigned', ['id' => $project->id, 'user_id' => $worker->id]) }}">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>

                                                        </li>
                                                    @endforeach
                                                @endif



                                            </ul>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Comfirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $(document).ready(function() {
        //     $('input#manager').val($("project-manager[selected='selected']").val());
        // });

    </script>
    <!--Worker Select Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List Workers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">

                        @if(count($workers) <= 0) Don't have worker @else @foreach($workers as $worker)
                        @if(count($worker->projects()->get()) < 2) <li class="list-group-item">
                                {{ $worker->name }} - {{ $worker->role }}

                                <a
                                    href="{{ route('admin.project.deleteAssigned', ['id' => $project->id, 'user_id' => $worker->id]) }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                                </li>
                            @endif
                            @endforeach
                            @endif
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Comfirm</button>
            </div>
        </div>
    </div>
@endsection
