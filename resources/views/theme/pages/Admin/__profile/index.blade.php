@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Admin.section_0_page_title')

    @include('theme.pages.Admin.__profile.form')

</div>

@endsection


@section('css')

   <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@once

    @push('scripts')
      <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
      <script src="{{asset('js/pages/select_2_init.js')}}"></script>
    @endpush

@endonce