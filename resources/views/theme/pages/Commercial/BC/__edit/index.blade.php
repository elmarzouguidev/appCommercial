@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Commercial.BC.section_0_page_title')

        @include('theme.pages.Commercial.BC.__edit.__form_edit')

    </div>

@endsection

@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@once

@push('scripts')

    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('js/pages/add_invoice.js') }}"></script>
    <script src="{{ asset('js/pages/form-repeater.int.js') }}"></script>

    @include('theme.pages.Commercial.BC.__edit.__delete_articles_bc_ajax')

    <script>
        //Warning Message
        $('#deleteBcommand').click(function () {
            Swal.fire({
                title: "Est-ce que vous êtes sûr ?",
                text: "vous ne pouvez pas annuler la suppression de ce Document !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Oui, supprimer le!"
            }).then(function (result) {
                if (result.value) {

                    Swal.fire("Supprimé!", "Le Bon de command  est supprimé avec succès.", "success");

                    setTimeout(function () {
                        document.getElementById('delete-bc-single-{{ $command->uuid }}').submit();
                    }, 2000);

                }
            });
        });
    </script>

@endpush

@endonce
