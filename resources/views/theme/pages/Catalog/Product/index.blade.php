@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Catalog.Product.__title')

    @include('theme.pages.Catalog.Product.__products')

</div>

@endsection

@push('scripts')

@endpush