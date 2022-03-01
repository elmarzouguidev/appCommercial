<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Forgot | Ticket APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary"> Reset Password</h5>
                                    <p>Re-Password with Skote.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{route('admin:home')}}">
                                <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/logo.svg')}}" alt="" class="rounded-circle"
                                                 height="34">
                                        </span>
                                </div>
                            </a>
                        </div>

                        <div class="p-2">
                            <div class="alert alert-success text-center mb-4" role="alert">
                                Enter your Email and instructions will be sent to you!
                            </div>
                            <form class="form-horizontal" action="{{ route('admin:auth:forgotpasswordPost') }}"
                                  method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="useremail"
                                           class="form-label @error('email') is-invalid @enderror">Email</label>
                                    <input id="useremail" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" placeholder="enter email" required
                                           autocomplete="email" autofocus>

                                </div>

                                <div class="text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Reset
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Remember It ? <a href="auth-login.html" class="fw-medium text-primary"> Sign In here</a></p>
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    ERP CASAMAINTENANCE <i class="mdi mdi-heart text-danger"></i> by HayMacProduction
                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
