@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @includePart('Calendar.sections.section_0_page_title')

    @includePart('Calendar.sections.section_a_calendar')

</div>

@endsection

@section('css')

    {{--@includePart('Calendar.styles')--}}
    
   <link rel="stylesheet" type="text/css" href="{{asset('css/fullcalendar.css')}}"  />

@endsection

@once

    @push('scripts')

    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>

    {{--@includePart('Calendar.scripts')--}}

    <script src="{{asset('js/fullcalendar.js')}}"></script>

    @endpush

@endonce