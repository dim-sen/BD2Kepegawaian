@extends('template.home')
@section('sub-judul', 'Tambah Peminjaman')
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

    <form action="{{ route('gaji.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>NIP</label>
            <select class="form-control" name="nip">
                <option value="" holder>Pilih NIP</option>
                @foreach($pegawais as $result)
                    <option value="{{ $result -> id }}">{{ $result -> nip }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tanggal_gaji">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save Data</button>
        </div>
    </form>
@endsection
