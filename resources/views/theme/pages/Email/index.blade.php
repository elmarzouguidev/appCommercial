@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Email.section_0_page_title')

    @include('theme.pages.Email.emails')
    
</div>

@include('theme.pages.Email.compose.composeModal')

@endsection