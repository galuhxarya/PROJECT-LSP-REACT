@extends('main.layout')
@section('content')
    <center>
        <h2>Tambah Data Kelas</h2>
        <form action="/kelas/store" method="POST">
            @csrf
            <table width="50%">
                <tr>
                    <td width="25%">Kelas</td>
                    <td width="25%"><input type="text" name="nama_kelas"></td>
                </tr>
                <tr>
                    <td width="25%">Jurusan</td>
                    <td width="25%">
                        <select name="jurusan_id">
                            <option></option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <button class="button-primary" type="submit">Simpan</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection