@extends('theme.layouts.app')

@section('content')
    <div class="container-fluid">

        @include('theme.pages.Catalog.Product.__title')

        @include('theme.pages.Catalog.Product.create.form')

    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@push('scripts')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(".select2").select2({
            width: '100%'
        });
    </script>
@endpush
