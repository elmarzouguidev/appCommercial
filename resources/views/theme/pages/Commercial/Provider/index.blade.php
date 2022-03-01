@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Commercial.Provider.section_0_page_title')

    @include('theme.pages.Commercial.Provider.__list.__providers')

</div>

@endsection

@push('scripts')
@endpush