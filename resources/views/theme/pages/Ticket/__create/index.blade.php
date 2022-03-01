@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Ticket.section_0_page_title')

    @include('theme.pages.Ticket.__create.form')

    @include('theme.pages.Ticket.__create.__create_client_modal')

</div>

@endsection

@section('css')

   {{--<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" />--}}
   <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@once

    @push('scripts')

      <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

      <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
      <script src="{{asset('js/pages/ticket-create.init.js')}}"></script>
      <script>

        $(".select2").select2({
            width: '100%'
        });

    </script>
    @endpush

@endonce
