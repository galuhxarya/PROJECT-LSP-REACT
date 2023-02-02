@extends('main.layout')
@section('content')
    <center>
        <b>
            <h2>List Nilai</h2>
            @if (session('user')->role == 'guru')
                <a href="/nilai/create" class="button-primary">Tambah Data</a>
            @endif

            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif

            <table cellpadding="10">
                <tr>
                    <td>No</td>
                    <td>Guru Mapel</td>
                    <td>Nama Siswa</td>
                    <td>UH</td>
                    <td>UTS</td>
                    <td>UAS</td>
                    <td>NA</td>
                    @if (session('user')->role == 'guru')
                        <td>Action</td>
                    @endif
                </tr>
                @foreach ($nilai as $each)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $each->mengajar->guru->nama_guru }} {{ $each->mengajar->mapel->nama_mapel }}</td>
                    <td>{{ $each->siswa->nama_siswa }}</td>
                    <td>{{ $each->uh }}</td>
                    <td>{{ $each->uts }}</td>
                    <td>{{ $each->uas }}</td>
                    <td>{{ $each->na }}</td>
                    @if (session('user')->role == 'guru')
                        <td>
                            <a href="/nilai/edit/{{ $each->id }}" class="button-warning">Edit</a>
                            <a href="/nilai/destroy/{{ $each->id }}" class="button-danger" onclick="return confirm ('Yakin Hapus')">Hapus</a>
                        </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </b>
    </center>
@endsection