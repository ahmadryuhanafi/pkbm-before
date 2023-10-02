<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Siswa PKBM Lestari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/login.css">
    <style>
        body {
            background-image: url(image/wallpaper.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .form {
            max-width: 560px;
            padding: 15px;
        }
    </style>
</head>

<body>
    <main class="form bg-light p-5 rounded w-100 mx-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Pendaftaran Siswa PKBM Lestari</h1>
        {{-- tag untuk menangkap pesan dari controller --}}
        @if (session()->has('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- tag untuk menangkap pesan dari controller --}}
        @if (session()->has('error'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- form --}}
        <form method="post" action="/daftar-siswa">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nik" name="nik"
                    value="{{ old('nik') }}" required>
                @error('nik')
                    {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No HP</label>
                <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp"
                    value="{{ old('nohp') }}">
                @error('nohp')
                    {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vaksin_ke" class="form-label">Lulusan sebelumnya</label>
                <select class="form-select" name="vaksin_ke">
                    <option value="1">--</option>
                    <option value="2">SD</option>
                    <option value="3">SMP</option>
                </select>
                @error('vaksin_ke')
                    {{-- pesan error --}}
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_id" class="form-label">Program</label>
                <select class="form-select @error('paket_id') is-invalid @enderror" name="jenis_id">
                    {{-- jika data ada, maka tampilkan menggunakan looping --}}
                    @if ($vaksins->count())
                        @foreach ($vaksins as $vaksin)
                            <option value="{{ $vaksin->id }}"
                                {{ old('jenis_id') == $vaksin->id ? 'selected' : '' }}>{{ $vaksin->jenis }}
                            </option>
                        @endforeach
                    @else
                        {{-- Jika tidak ada, tampilkan option disabled --}}
                        <option value="" disabled>Belum ada program</option>
                    @endif
                </select>
                {{-- pesan error --}}
                @error('jenis_id')
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
        <a href="/" class="btn btn-danger position-absolute top-0 start-0 ms-4 mt-3 fs-6"><i
                class="bi bi-arrow-left"></i> Kembali</a>
    </main>
    {{-- script js bundle bootstrap cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
