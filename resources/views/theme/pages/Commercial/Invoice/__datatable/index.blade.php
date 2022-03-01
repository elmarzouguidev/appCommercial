@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.Invoice.section_0_title')

        @include('theme.pages.Commercial.Invoice.__datatable.__invoices_table')



    </div>

@endsection

@section('css')

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@push('scripts')

    <!-- Datatable init js -->
    <script src="{{ asset('assets/libs/datatables.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>

    <script>
        function openFilters() {
            var element = document.getElementById("invoices-list");
            element.classList.toggle("col-lg-10");

            var element = document.getElementById("filters-list");
            element.classList.toggle("d-none");
        }
        /*********************************************/
        $(".select2").select2({
            width: '100%'
        });

    </script>

    @include('theme.pages.Commercial.Invoice.__js');

@endpush
