@extends('template.home')
@section('sub-judul', 'Data Golongan')
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

    <a href="{{ route('golongan.create') }}" class="btn btn-success btn-sm">Tambah Golongan</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>ID Golongan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Pasangan</th>
            <th>Tunjangan Anak</th>
            <th>Tunjangan Transport</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($golongans as $result => $hasil)
            <tr>
                <td>{{ $result + $golongans -> firstitem() }}</td>
                <td>{{ $hasil ->  id_golongan }}</td>
                <td>{{ $hasil ->  gaji_pokok }}</td>
                <td>{{ $hasil ->  tunjangan_pasangan }}</td>
                <td>{{ $hasil ->  tunjangan_anak }}</td>
                <td>{{ $hasil ->  tunjangan_transport }}</td>
                <td>
                    <form action="{{ route('golongan.destroy', $hasil -> id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('golongan.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $golongans -> links() }}

@endsection
