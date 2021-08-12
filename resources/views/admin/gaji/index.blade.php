@extends('template.home')
@section('sub-judul', 'Data Gaji')
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

    <a href="{{ route('gaji.create') }}" class="btn btn-success btn-sm">Tambah Gaji</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Tanggal Gaji</th>
            <th>Jumlah Gaji</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gajis as $result => $hasil)
            <tr>
                <td>{{ $result + $gajis -> firstitem() }}</td>
                <td>{{ $hasil -> pegawais -> nip }}</td>
                <td>{{ $hasil -> tanggal_gaji }}</td>
                <td>Rp{{ $hasil -> jumlah_gaji }}</td>
                <td>Rp{{ $hasil -> potongan }}</td>
                <td>Rp{{ $hasil -> total_gaji }}</td>
                <td>
                    <form action="{{ route('gaji.destroy', $hasil -> id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('gaji.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $gajis -> links() }}
@endsection
