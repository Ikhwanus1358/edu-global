<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = siswa::where('nama', 'like', "%$katakunci%")
                ->orWhere('kelas', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = siswa::orderBy('nama', 'desc')->paginate($jumlahbaris);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('kelas', $request->kelas);
        Session::flash('status', $request->status);

        $request->validate([
            'nama' => 'required',
            'kelas' => 'required|numeric|unique:siswa,kelas',
            'status' => 'required|numeric|unique:siswa,status',
        ], [
            'nama.required' => 'nama wajib diisi',
            'nama.unique' => 'nama yang diisikan sudah ada dalam database',
            'kelas.required' => 'kelas wajib diisi',
            'status.required' => 'status wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nama', $id)->first();
        $data = kelas::where('kelas', $id)->first();

        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required',
            'status' => 'required',
        ], [
            'kelas.required' => 'kelas wajib diisi',
            'status.required' => 'status wajib diisi',
        ]);
        $data = [
            'kelas' => $request->kelas,
            'status' => $request->status,
        ];
        siswa::where('nama', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        siswa::where('nama', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan delete data');
    }
}
