@extends('partials.navbar') {{-- menggunakan layout admin --}}

@section('main') {{-- section untuk konten pada @yield --}}
    <h4 class="my-3 ">{{ $title }}</h4>
    <a href="/jenis/create" type="button" class="btn btn-primary my-3"><i class="bi bi-clipboard-plus"></i> Tambah jenis program</a>
    {{-- tag untuk menangkap pesan dari controller --}}
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- tabel data --}}
    <table class="table ">
        <thead class="table-secondary">
            <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nama Program</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Jika data ada, maka akan ditampilkan --}}
            @if ($vaksins->count())
            {{-- Menampilkan data dengan perulangan foreach --}}
                @foreach ($vaksins as $vaksin)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vaksin->jenis }}</td>
                    <td>
                        <a href="/jenis/{{ $vaksin->id }}/edit" type="submit" class="btn btn-warning"><p>Edit</p></a>
                        <form action="/jenis/{{ $vaksin->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger border-0"><p>Hapus</p></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else 
            {{-- Jika data tidak ada, maka akan menampilkan pesan data kosong --}}
                <tr>
                    <td class="text-center text-muted border-0 py-3" colspan="6">Belum ada program</td>
                </tr>
            @endif
            
        </tbody>
    </table>
    {{-- Link untuk paginasi, jika data lebih dari 10 --}}
    <div class="d-flex justify-content-center">
        {{ $vaksins->links() }}
    </div>
@endsection