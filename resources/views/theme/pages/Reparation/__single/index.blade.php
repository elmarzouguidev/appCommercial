@extends('theme.layouts.app')

@section('content')

<div class="container-fluid">

    @include('theme.pages.Reparation.section_0_page_title')

    @include('theme.pages.Reparation.__single.detail')

</div>

@endsection

@section('css')
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@once

    @push('scripts')
      {{--<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>--}}

      <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
      <script src="{{asset('js/pages/ticket-create.init.js')}}"></script>

      <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

      <script>
          //Warning Message
          $('#closeTicketReparation').click(function () {
              Swal.fire({
                  title: "Est-ce que vous êtes sûr ?",
                  text: "vous ne pouvez pas modifier le rapport autre fois !",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#34c38f",
                  cancelButtonColor: "#f46a6a",
                  confirmButtonText: "Oui, Términe la réparation!"
              }).then(function (result) {
                  if (result.value) {

                      Swal.fire("Envoyé!", "La réparation est terminé avec succès.", "success");

                      setTimeout(function () {
                          document.getElementById('TicketRapportForm').submit();
                      }, 2000);
                  }
              });
          });
      </script>
    @endpush

@endonce
