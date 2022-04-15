<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/ruang-admin/img/logo/bg_A.png" rel="icon">
    <title>Register</title>
    <link href="assets/ruang-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/ruang-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/ruang-admin/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form action="/register" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="16 digits.." value="{{ old('nik') }}" autofocus>
                                            @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama lengkap</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama.." value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">No. Telepon</label>
                                            <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" placeholder="12 digits.." value="{{ old('telp') }}">
                                            @error('telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username.." value="{{ old('username') }}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="/login">Already have an account?</a>
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
    <!-- Register Content -->
    <script src="assets/ruang-admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/ruang-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/ruang-admin/js/ruang-admin.min.js"></script>
</body>

</html>