@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('mahasiswa/'.$data->Nama) }}' method='post'>
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('mahasiswa') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            {{ $data->Nama }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Kelas' value="{{ $data->Kelas }}" id="Kelas">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Status' value="{{ $data->Status }}" id="Status">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Status" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection