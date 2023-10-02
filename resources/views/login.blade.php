<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css"/>
    <link rel="stylesheet" href="css/login.css">
    <style>
        body{
            background-image: url(image/wallpaper.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body>
    <main class="form-signin bg-light p-5 rounded w-100 m-auto">
        <form method="POST" action="/login-proses">
            {{-- Pesan error jika gagal login --}}
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error')  }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Admin</h1>
    
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                @error('email') {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" value="{{ old('password') }}" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password') {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>
        </form>
    </main>
    <a href="/" class="btn btn-danger position-absolute top-0 start-0 ms-4 mt-3 fs-6"><i class="bi bi-arrow-left"></i> Kembali</a>
    {{-- script js bundle bootstrap cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>