@extends('template.home')
@section('sub-judul', 'Tambah Pegawai')
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

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="nip">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label class="form-label">Jenis Kelamin</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_kelamin" value="pria" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Pria</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_kelamin" value="wanita" class="selectgroup-input">
                    <span class="selectgroup-button">Wanita</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tanggal_lahir">
            </div>
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control phone-number" name="no_telp">
            </div>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="form-group">
            <label class="form-label">Status Nikah</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="status_nikah" value="belum nikah" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Belum nikah</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="status_nikah" value="nikah" class="selectgroup-input">
                    <span class="selectgroup-button">Nikah</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="text" class="form-control" name="jumlah_anak">
        </div>
        <div class="form-group">
            <label>Golongan</label>
            <select class="form-control" name="id_golongan">
                <option value="" holder>Pilih Golongan</option>
                @foreach($golongans as $result)
                    <option value="{{ $result -> id }}">{{ $result -> id_golongan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save Data</button>
        </div>
    </form>
@endsection
