@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Diagnostic.section_0_page_title')

    {{--@include('theme.pages.Diagnostic.__list.index')--}}

    @include('theme.pages.Diagnostic.__tap_view.index')

</div>

@endsection