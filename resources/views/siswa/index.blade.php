@extends('layout.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
            </div>
            
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
            <a href='' class="btn btn-primary">+ Tambah Data</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">Nama</th>
                        <th class="col-md-4">Kelas</th>
                        <th class="col-md-2">Status</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (@uses as $user)

                    <tr>
                        <th scope="row"> {{ $user->id}} </th>
                        <td>{{ $user->nama }}</td>
                        <td>Kelas 9</td>
                        <td>
                            <a href="user/{{ $user->id }}" class="btn btn-sm btn-{{ $user->status ? 'success' : 'danger'}}">
                                {{ $user->status ? 'Aktif' : 'Non-Aktif'}}
                            </a> 
                        </td>
                        <td>
                            <a href='{{url('siswa/'.$item->nama.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{url('siswa/'.item->nama)}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
        @endsection
        <!-- AKHIR DATA -->
    