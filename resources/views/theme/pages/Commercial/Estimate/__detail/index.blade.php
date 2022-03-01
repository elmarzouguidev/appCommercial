@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.Estimate.__detail.estimate_detail_top')

        @include('theme.pages.Commercial.Estimate.__detail.estimate')

    </div>

@endsection

@section('css')

    <style type="text/css" media="print">
  

  @media print {
    @page {
        margin-top: 0;
        margin-bottom: 0;
    }
    body {
        padding-top: 720px;
        padding-bottom: 72px ;
    }
}

    </style>



@endsection

@section('meta')

@endsection

@push('scripts')

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endpush
