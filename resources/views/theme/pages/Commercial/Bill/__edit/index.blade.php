@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.Bill.section_0_page_title')

        @include('theme.pages.Commercial.Bill.__edit.__form_edit')

    </div>

@endsection

@section('css')

    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
        
@endsection

@once

    @push('scripts')
       
        <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/pages/add_invoice.js') }}"></script>

        <script>
        </script>

    @endpush

@endonce
