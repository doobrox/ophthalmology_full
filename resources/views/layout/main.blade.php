@extends('../layout/base')

@section('body')
    <body class="main">

    <style>
        .onMouseHoverClass:hover {
            cursor: pointer;
        }
        .req-field-to-save {
            background-color: lightcoral;
        }
        .w-150px {
            min-width: 150px;
        }
        .text-green-600 {
            color: rgb(5, 122, 85);
        }
        .badge-relationship {
            background-color:rgb(199,210,254);
            color:rgb(79,70,229);
        }

        .badge {
            border-radius:.25rem;
            display:inline-block;
            font-weight:600;
            font-size:.75rem;
            line-height:1rem;
            margin-right:.25rem
        }

        .badge:last-child {
            margin-right:0
        }

        .badge {
            padding: 0.25rem 0.25rem;
            margin-bottom: 0.5rem;
        }
    </style>
        @yield('content')
        @include('../layout/components/dark-mode-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        {{--<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>--}}

        {{-- TODO urmatoarele 7 trebuie vazut daca raman asa --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            var globalDateFormat = "DD-MM-YYYY";
            var globalDateFormatDB = "YYYY-MM-DD";
        </script>

        <!-- Moment -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <!-- Javascript Auto-complete -->
        <script src="{{ asset ('plugins/javascript-auto-complete/auto-complete.min.js') }}"></script>

        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
        @stack('scripts')
        @livewire('livewire-ui-modal')
        @livewireScripts

        <script src="//unpkg.com/alpinejs" defer></script>

    </body>
@endsection
