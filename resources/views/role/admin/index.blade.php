@extends('layouts.side_bar')

@section('sidebar-menu')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Users
                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('admin.project.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
