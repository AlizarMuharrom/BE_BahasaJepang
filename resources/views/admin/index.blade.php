<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Benkyou</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assetAdmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assetAdmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ asset('assetAdmin/img/Bg-Japan.jpg') }}" alt="" class="img-fluid"
                                    style="height: 100%; object-fit: cover;">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="{{ route('loginProses') }}" class="user" method="post"
                                        autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" autocomplete="new-password">
                                            <span toggle="#exampleInputPassword"
                                                class="fa fa-fw fa-eye field-icon toggle-password"
                                                style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></span>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assetAdmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assetAdmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assetAdmin/js/sb-admin-2.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('not_admin'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Akses Ditolak",
                text: "{{ $message }}",
            });
        </script>
    @endif

    <script>
        $(document).ready(function () {
            $(".toggle-password").click(function () {
                const input = $($(this).attr("toggle"));
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).toggleClass("fa-eye fa-eye-slash");
            });
        });
    </script>

    <script>
        document.getElementById('showLoginInfo').addEventListener('click', function () {
            Swal.fire({
                title: 'Informasi Login Admin',
                html: '<b>Email:</b> admin@example.com<br><b>Password:</b> admin123',
                icon: 'info',
                confirmButtonText: 'Tutup'
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</body>

</html>