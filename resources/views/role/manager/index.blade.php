@extends('layouts.side_bar')

@section('content')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                <a href="{{ route('projectWorker') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reportWorker') }}" class="nav-link"><i class="nav-icon fas fa-table"></i>
                    <p>
                        Report
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
