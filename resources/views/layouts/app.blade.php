<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>

<style>
    [x-cloak] {
        display: none;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    .select2 {
        width:100%!important;
    }
    .min-h-32px {
        min-height: 32px;
    }
    .min-h-25px {
        min-height: 25px;
    }
    .select2-selection__rendered {
        line-height: 38px !important;
    }
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-selection {
        --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        border: 1px solid #dee2e6!important;
    }

    @media (min-width: 640px) {
        .sm\:max-w-2xl {
            max-width: 60rem!important;
        }}
</style>

<body class="bg-gray-200">
{{--<span class="btn btn-block btn-default" onclick="Livewire.emit('openModal', 'add-new-patient')">Introducere Pacent nou</span>--}}
{{--<a href="receptie">receptie</a>--}}

@include('includes.header')

{{--@extends('adminlte::page')--}}

{{--@section('title', 'Dashboard')--}}

{{--@section('content_header')--}}
    {{--<h1>Dashboard</h1>--}}
{{--@stop--}}

{{--@section('content')--}}
    {{--<p>Welcome to this beautiful admin panel.</p>--}}
{{--@stop--}}

{{--@section('css')--}}

{{--@stop--}}

{{--@section('js')--}}
    {{--<script> console.log('Hi!'); </script>--}}
{{--@stop--}}

{{--@section('footer')--}}
    {{--<strong>Copyright @ 2021</strong>--}}
    {{--All rights reserved.--}}
    {{--<div class="float-right d-none d-sm-inline-block">--}}
        {{--<b>Version</b> 1.0--}}
    {{--</div>--}}
{{--@stop--}}

{{--<div class="container mx-auto">--}}
    {{--<hr>--}}
        {{--TEST SECTION--}}
        {{--@yield('add_statement_sheet')--}}
        {{--@yield('see_crystalline')--}}
        {{--@yield('patients_info')--}}
        {{--@yield('patients_details')--}}
        {{--@yield('patients_edit')--}}
        {{--@yield('reception')--}}

<div class="container">
    @yield('content')
    @yield('receptie')
    @yield('medic')
    @yield('add_consultatie')
    @yield('add_plata')
    @yield('add_ochelari')
    @yield('lista_proceduri')
    @yield('add_procedura')
    @yield('asociere_proceduri')
    @yield('edit_procedura')
    @yield('lista_articole')
    @yield('add_articol')
    @yield('edit_articol')
    @yield('pacient_plata')
</div>
    {{--<hr>--}}
    {{--<p class="whatScriptsLoad"></p>--}}
    {{--<hr>--}}
{{--</div>--}}



{{-- Adaugam JS doar daca pagina este activa --}}
{{--@stack('add_statement_sheet_scripts')--}}
{{--@stack('patients_info_scripts')--}}

{{--@livewire('livewire-ui-modal')--}}


<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

@livewire('livewire-ui-modal')
@livewireScripts
@include('includes.footer')
<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>