@extends('main.layout')
@section('content')
<center>
    <br>
    <h2>Ubah Data Siswa</h2>
    <form method="post" action="/nilai/update/{{ $nilai->id }}">
    @csrf
    <table width="50%">
        <tr>
            <td width="25%">Guru Mapel</td>
            <td width="25%">
                <select name="mengajar_id">
                    <option></option>
                    @foreach ($mengajar as $each)
                            <option value="{{ $each->id }}" @if ($each->id == $nilai->mengajar_id) selected @endif>
                                {{ $each->mapel->nama_mapel }}
                            </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td width="25%">Nama Siswa</td>
            <td width="25%">
                <select name="siswa_id">
                     <option></option>
                    @foreach ($siswa as $each)
                            <option value="{{ $each->id }}" @if ($each->id == $nilai->siswa_id) selected @endif>
                                {{ $each->nama_siswa }}
                            </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td width="25%">UH</td>
            <td width="25%"><input type="number" name="uh" value="{{ $nilai->uh }}"></td>
        </tr>
        <tr>
            <td width="25%">UTS</td>
            <td width="25%"><input type="number" name="uts" value="{{ $nilai->uts }}"></td>
        </tr>
        <tr>
            <td width="25%">UAS</td>
            <td width="25%"><input type="number" name="uas" value="{{ $nilai->uas }}"></td>
        </tr>
        <tr>
            <td colspan="2">
                <center><button class="button-primary" type="submit">Ubah</button></center>
            </td>
        </tr>
    </table>
    </form>
</center>

@endsection