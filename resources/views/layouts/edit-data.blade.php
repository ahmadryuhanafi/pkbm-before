@extends('partials.navbar') {{-- menggunakan layout admin --}}

@section('main') {{-- section untuk konten pada @yield --}}
    <h4 class="my-3 ">{{ $title }}</h4>
    {{-- tag untuk menangkap pesan dari controller --}}
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        {{-- form --}}
        <form method="post" action="/data/{{ $vaksin->id }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penerima</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $vaksin->nama) }}">
            @error('nama') {{-- pesan error --}}
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK Penerima</label>
            <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $vaksin->nik) }}" required>
            @error('nik') {{-- pesan error --}}
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">No HP Penerima</label>
            <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp', $vaksin->nohp) }}">
            @error('nohp') {{-- pesan error --}}
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_id" class="form-label">Jenis Vaksin Penerima</label>
            <select class="form-select @error('paket_id') is-invalid @enderror" name="jenis_id"> 
                @foreach($jeniss as $jn)
                    @if (old('jenis_id', $vaksin->jenis_id) == $jn->id) {{-- jika data paket_id dan old ada, tampilkan dari database --}}
                        <option value="{{ $jn->id }}" selected>{{ $jn->jenis }}</option>
                    @else {{-- jika data ada, akan ditampilkan  --}}
                        <option value="{{ $jn->id }}">{{ $jn->jenis }}</option>
                    @endif
                @endforeach
            </select>
            {{-- pesan error --}}
            @error('jenis_id')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="vaksin_ke" class="form-label">Lulusam Sebelumnya</label>
            <select class="form-select" name="vaksin_ke">
                <option value="1" {{  $vaksin->vaksin_ke == 1 ? 'selected' : '' }}>--</option>
                <option value="2" {{  $vaksin->vaksin_ke == 2 ? 'selected' : '' }}>SD</option>
                <option value="3" {{  $vaksin->vaksin_ke == 3 ? 'selected' : '' }}>SMP</option>
            </select>
            @error('vaksin_ke') {{-- pesan error --}}
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection