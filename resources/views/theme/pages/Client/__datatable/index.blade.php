@extends('theme.layouts.app')

@section('content')
    <div class="container-fluid">

        @include('theme.pages.Client.section_0_page_title')

        @include('theme.pages.Client.__datatable.__clients_table')

    </div>
@endsection

@section('css')
@endsection

@push('scripts')
    <script src="{{ asset('assets/libs/datatables.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>
@endpush
