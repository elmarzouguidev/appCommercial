@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Client.section_0_page_title')

    @include('theme.pages.Client.__create.form_2')

</div>

@endsection

@section('css')

@endsection

@once

    @push('scripts')
      <script src="{{asset('assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
      <script src="{{asset('js/pages/form-repeater.int.js')}}"></script>
    @endpush

@endonce