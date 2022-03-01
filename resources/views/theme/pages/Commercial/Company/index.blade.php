@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Commercial.Company.section_0_page_title')

    @include('theme.pages.Commercial.Company.__list.__companies')

</div>

@endsection

@push('scripts')
@endpush