@extends('layouts.side_bar')

@section('sidebar-menu')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('manager.user.index') }}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    User

                </p>

            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('manager.project.index') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Projects
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('manager.absent.index') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Absent
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('manager.report.index') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Report
                </p>
            </a>
        </li>
    </ul>
</nav>
@endsection
