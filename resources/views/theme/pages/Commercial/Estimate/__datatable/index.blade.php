@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.Estimate.section_0_title')

        @include('theme.pages.Commercial.Estimate.__datatable.__estimates_table')

    </div>

@endsection

@section('css')

@endsection

@push('scripts')

    <script src="{{ asset('assets/libs/datatables.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>
    
@endpush

