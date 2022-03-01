@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.InvoiceAvoir.section_0_title')

        @include('theme.pages.Commercial.InvoiceAvoir.__datatable.__invoices_table')

    </div>

@endsection

@section('css')

@endsection

@push('scripts')

    <script src="{{ asset('assets/libs/datatables.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>

    <script>
        function openFilters() {
            var element = document.getElementById("invoices-list");
            element.classList.toggle("col-lg-10");

            var elementer = document.getElementById("filters-list");
            elementer.classList.toggle("d-none");
        }
    </script>

@endpush
