@extends('layout.template')
<!-- START FORM -->
@section('konten')
<form action='{{url('siswa')}}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='Nama' id="Nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    >
                    <option value="1">Kelas 10</option>
                    <option value="2">Kelas 11</option>
                    <option value="3">Kelas 12</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Kelas" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                <label class="btn btn-outline-success" for="success-outlined">Aktif</label>
                
                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                <label class="btn btn-outline-danger" for="danger-outlined">Non-Aktif</label>
                
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Kelas" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->