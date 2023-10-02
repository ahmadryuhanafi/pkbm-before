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
    {{-- tabel data --}}
    <table class="table ">
        <thead class="table-secondary">
            <tr class="text-center">
                <th scope="col">Nama</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Program</th>
                <th scope="col">No HP</th>
                <th scope="col">Lulusan Sebelumnya</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Jika data ada, maka akan ditampilkan --}}
            @if ($datas->count())
            {{-- Menampilkan data dengan perulangan foreach --}}
                @foreach ($datas as $data)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->vaksin->jenis }}</td>
                    <td>{{ $data->nohp }}</td>
                    <td>{{ $data->vaksin_ke }}</td>
                    <td>
                        <a href="/data/{{ $data->id }}/edit" type="submit" class="btn btn-warning"><p>Edit</p></a>
                        <form action="/data/{{ $data->id }}" method="post" class="d-inline">
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
                    <td class="text-center text-muted border-0 py-3" colspan="6">Belum ada data</td>
                </tr>
            @endif
            
        </tbody>
    </table>
    {{-- Link untuk paginasi, jika data lebih dari 10 --}}
    <div class="d-flex justify-content-center">
        {{ $datas->links() }}
    </div>
@endsection