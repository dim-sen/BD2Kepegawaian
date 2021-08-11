@extends('template.home')
@section('sub-judul', 'Edit Anggota')
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

    <form action="{{ route('pegawai.update', $pegawais -> id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="nip" value="{{ $pegawais -> nip }}">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $pegawais -> nama }}">
        </div>
        <div class="form-group">
            <label class="form-label">Jenis Kelamin</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_kelamin" value="pria"
                           @if($pegawais -> jenis_kelamin == "pria")
                           checked
                           @endif
                           class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Pria</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_kelamin" value="wanita"
                           @if($pegawais -> jenis_kelamin == "wanita")
                           checked
                           @endif
                           class="selectgroup-input">
                    <span class="selectgroup-button">Wanita</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="{{ $pegawais -> tempat_lahir }}">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tanggal_lahir" value="{{ $pegawais -> tanggal_lahir }}">
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
                <input type="text" class="form-control phone-number" name="no_telp" value="{{ $pegawais -> no_telp }}">
            </div>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $pegawais -> alamat }}">
        </div>
        <div class="form-group">
            <label class="form-label">Status Nikah</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="status_nikah" value="belum nikah"
                           @if($pegawais -> status_nikah == "belum nikah")
                           checked
                           @endif
                           class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Belum nikah</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="status_nikah" value="nikah"
                           @if($pegawais -> status_nikah == "nikah")
                           checked
                           @endif
                           class="selectgroup-input">
                    <span class="selectgroup-button">Nikah</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="text" class="form-control" name="jumlah_anak" value="{{ $pegawais -> jumlah_anak }}">
        </div>
        <div class="form-group">
            <label>Golongan</label>
            <select class="form-control" name="id_golongan">
                <option value="" holder>Pilih Golongan</option>
                @foreach($golongans as $result)
                    <option value="{{ $result -> id }}"
                            @if($pegawais -> id_golongan == $result -> id)
                            selected
                            @endif
                    >{{ $result -> id_golongan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Update Data</button>
        </div>
    </form>
@endsection
