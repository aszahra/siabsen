<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMatpel;
use App\Models\DataSiswa;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $guru = DataGuru::all();
            $matpel = DataMatpel::all();
            $kelas = DataKelas::all();
            if (Auth::user()->role == "Guru") {
                $absensi = Absensi::join('data_guru', 'absensi.id_guru', '=', 'data_guru.id')
                    ->where('data_guru.id_user', Auth::id())
                    ->paginate(10);
            } else {
                $absensi = Absensi::paginate(10);
            }
            // $absensi = Absensi::paginate(10);

            return view('page.absensi.index', compact('absensi'))->with([
                'guru' => $guru,
                'matpel' => $matpel,
                'kelas' => $kelas,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $guru = DataGuru::all();
            $matpel = DataMatpel::all();
            $kelas = DataKelas::all();
            return view('page.absensi.create')->with([
                'guru' => $guru,
                'matpel' => $matpel,
                'kelas' => $kelas,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**ab
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     Absensi::create([
    //         'id_guru' => $request->id_guru,
    //         'id_jadwal' => $request->id_jadwal,
    //         'tanggal' => $request->tanggal,
    //     ]);

    //     return redirect()->route('absensi.index')->with('message_insert', 'Data Berhasil Ditambahkan');
    // }

    public function store(Request $request)
    {
        try {
            $data = [
                'id_guru' => $request->input('id_guru'),
                'id_matpel' => $request->input('id_matpel'),
                'id_kelas' => $request->input('id_kelas'),
                // 'tanggal' => $request->input('tanggal'),
                'hari' => $request->input('hari'),
                'waktu_mulai' => $request->input('waktu_mulai'),
                'waktu_selesai' => $request->input('waktu_selesai'),
                // 'minggu' => $request->input('minggu'),
            ];

            Absensi::create($data);

            return redirect()
                ->route('absensi.index')
                ->with('message_insert', 'Data Absensi Berhasil Ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
                'id_guru' => $request->input('id_guru'),
                'id_matpel' => $request->input('id_matpel'),
                'id_kelas' => $request->input('id_kelas'),
                // 'tanggal' => $request->input('tanggal'),
                'hari' => $request->input('hari'),
                'waktu_mulai' => $request->input('waktu_mulai'),
                'waktu_selesai' => $request->input('waktu_selesai'),
                // 'minggu' => $request->input('minggu'),
            ];

            $absensi = Absensi::findOrFail($id);
            $absensi->update($data);

            return redirect()
                ->route('absensi.index')
                ->with('message_update', 'Data Guru Berhasil Diupdate');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Absensi::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Absensi Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
