@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Setting.__title')

        @include('theme.pages.Setting.settings')

    </div>

@endsection

@push('scripts')

@endpush
