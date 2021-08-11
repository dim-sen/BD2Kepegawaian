@extends('template.home')
@section('sub-judul', 'Tambah Golongan')
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

    <form action="{{ route('golongan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>ID Golongan</label>
            <input type="text" class="form-control" name="id_golongan">
        </div>
        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="text" class="form-control" name="gaji_pokok">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save Data</button>
        </div>
    </form>
@endsection
