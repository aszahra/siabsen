<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kelas = DataKelas::all();
            $datasiswa = DataSiswa::paginate(10);
            return view('page.datasiswa.index', compact('datasiswa'))->with([
                'kelas' => $kelas,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'id_kelas' => $request->input('id_kelas'),
                'nis' => $request->input('nis'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir')
            ];
            // Datasiswa::create($data);

            $exists = \App\Models\DataSiswa::where('nis', $request->nis)->exists();

            if ($exists) {
                return redirect()->back()->with('exist', 'Siswa tersebut sudah terdaftar!');
            }

            \App\Models\DataSiswa::create($data);


            // return back()->with('message_delete', 'Data Customer Sudah di Hapus');

            return redirect()
                ->route('datasiswa.index')
                ->with('message_insert', 'Data Siswa Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            // return view('error.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = [
                'id_kelas' => $request->input('id_kelas_edit'),
                'nis' => $request->input('nis'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir'),
            ];


            // $datas = Datasiswa::findOrFail($id);
            // $datas->update($data);

            $existing = \App\Models\DataSiswa::where('nis', $request->nis)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                return redirect()->back()->with('exist', 'Siswa dengan NIS tersebut sudah terdaftar!');
            }

            $siswa = \App\Models\DataSiswa::findOrFail($id);
            $siswa->update($data);

            return redirect()
                ->route('datasiswa.index')
                ->with('message_insert', 'Data Siswa Sudah diupdate');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            // return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = DataSiswa::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Siswa Berhasil Dihapus!');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            // return view('error.index');
        }
    }
}
