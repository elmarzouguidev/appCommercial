@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.Bill.section_0_page_title')

        @include('theme.pages.Commercial.Bill.__datatable.__bills_table')

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

        $(document).ready(function () {
            window.initSelectCompanyDrop = () =>

            {
                $('#get-invoice').select2({
                    placeholder: 'choisir la facture',
                    allowClear: true,
                    dropdownParent: $("#addBill"),
                    width: '100%'
                });
            }
            initSelectCompanyDrop();

        });

    </script>

@endpush
