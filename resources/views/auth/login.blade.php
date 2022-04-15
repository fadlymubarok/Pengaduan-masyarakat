<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/ruang-admin/img/logo/bg_A.png" rel="icon">
    <title>Login - Mengadu</title>
    <link href="assets/ruang-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/ruang-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/ruang-admin/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9 mt-4">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Login</h1>
                                    </div>
                                    <form method="POST" action="/login">
                                        @csrf
                                        @if(session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="/register">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="assets/ruang-admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/ruang-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/ruang-admin/js/ruang-admin.min.js"></script>
</body>

</html>