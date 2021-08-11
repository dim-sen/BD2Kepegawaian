@extends('template.home')
@section('sub-judul', 'Data Pegawai')
@section('content')

    @if(count($errors) > 0)
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <a href="{{ route('pegawai.create') }}" class="btn btn-success btn-sm">Tambah Pegawai</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
            <th>Status Nikah</th>
            <th>Jumlah Anak</th>
            <th>Golongan</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pegawais as $result => $hasil)
        <tr>
            <td>{{ $result + $pegawais -> firstitem() }}</td>
            <td>{{ $hasil ->  nip }}</td>
            <td>{{ $hasil ->  nama }}</td>
            <td>{{ $hasil ->  jenis_kelamin }}</td>
            <td>{{ $hasil ->  tempat_lahir }}</td>
            <td>{{ $hasil ->  tanggal_lahir }}</td>
            <td>{{ $hasil ->  no_telp }}</td>
            <td>{{ $hasil ->  alamat }}</td>
            <td>{{ $hasil ->  status_nikah }}</td>
            <td>{{ $hasil ->  jumlah_anak }}</td>
            <td>{{ $hasil ->  golongans -> id_golongan }}</td>
            <td>
                <form action="{{ route('pegawai.destroy', $hasil -> id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('pegawai.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $pegawais -> links() }}
@endsection
