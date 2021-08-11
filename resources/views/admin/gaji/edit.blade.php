@extends('template.home')
@section('sub-judul', 'Edit Gaji')
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

    <form action="{{ route('gaji.update', $gajis -> id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>NIP</label>
            <select class="form-control" name="nip">
                <option value="" holder>Pilih NIP</option>
                @foreach($pegawais as $result)
                    <option value="{{ $result -> id }}"
                            @if($gajis -> nip == $result -> id)
                            selected
                            @endif
                    >{{ $result -> nip }}</option>
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
                <input type="date" name="tanggal_gaji"  value="{{ $gajis -> tanggal_gaji }}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Update Data</button>
        </div>
    </form>
@endsection
