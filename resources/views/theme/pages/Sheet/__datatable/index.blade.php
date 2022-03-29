@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Sheet.section_0_title')

        @include('theme.pages.Sheet.__datatable.__sheets_table')

    </div>

@endsection

@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@push('scripts')

    <script src="{{ asset('assets/libs/datatables.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    
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
