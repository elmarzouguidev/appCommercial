@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Profile.section_0_page_title')

        @include('theme.pages.Profile.settings.settings')

    </div>

@endsection

@push('scripts')

@endpush
