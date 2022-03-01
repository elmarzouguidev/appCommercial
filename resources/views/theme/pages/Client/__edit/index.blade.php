@extends('theme.layouts.app')

@section('content')

    <div class="container-fluid">

        @include('theme.pages.Client.section_0_page_title')

        @include('theme.pages.Client.__edit.form_2')

    </div>

@endsection

@section('css')

@endsection

@once

@push('scripts')
    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/pages/form-repeater.int.js') }}"></script>

    <script>
        $(".deletePhone").click(function (event) {

            event.preventDefault();

            var result = confirm('Are you sure you want to delete this record?');

            var client = $(this).data("client");
            var phone = $(this).data("phone");
            var token = $("meta[name='csrf-token']").attr("content");

            if (result) {

                $.ajax({
                    url: "{{ route('admin:client.delete.phone') }}",
                    type: 'DELETE',
                    data: {
                        "client": client,
                        "phone": phone,
                        "_token": token,
                    },
                    success: function () {
                        console.log("it Works");
                        $("#phones_list").load(window.location.href + " #phones_list");
                        window.location.reload();
                    }
                });
            }

        });
    </script>

    <script>
        $(".deleteClientEmail").click(function (event) {

            event.preventDefault();

            var result = confirm('Are you sure you want to delete this email?');

            var client = $(this).data("client");
            var email = $(this).data("email");
            var token = $("meta[name='csrf-token']").attr("content");

            if (result) {

                $.ajax({
                    url: "{{ route('admin:client.delete.email') }}",
                    type: 'DELETE',
                    data: {
                        "client": client,
                        "email": email,
                        "_token": token
                    },
                    success: function () {
                        console.log("it Works");
                        window.location.reload();
                    }
                });
            }

        });
    </script>
@endpush

@endonce
