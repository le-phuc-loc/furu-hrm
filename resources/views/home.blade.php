@extends('layouts.app')

@section('content')
    {{-- {{ dd(session('role') == 'admin') }} --}}
    @if (session('role') == 'admin')
        @yield('admin')
        {{ echo('admin'); }}
    @elseif (session('role') == 'manager')
        @yield('manager')
        {{ echo('manager'); }}
    @elseif (session('role') == 'worker')
        @yield('worker')
        {{ echo('worker'); }}
    @endif
@endsection
