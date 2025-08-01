<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMatpel;
use App\Models\DataSiswa;
use App\Models\DetailAbsensi;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $matpel = DataMatpel::all();
        // $kelas = DataKelas::all();
        // $absensi = Absensi::paginate(10);
        // return View('page.absensi.index')->with([
        //     'absensi' => $absensi,
        //     'matpel' => $matpel,
        //     'kelas' => $kelas,
        // ]);

        $jadwal = Jadwal::all();
        // $kelas = DataKelas::all();
        // $absensi = Absensi::paginate(10);
        return view('page.absensi.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $data_guru = DataGuru::all();
        $data_siswa = DataSiswa::all();
        return view('page.absensi.create')->with([
            'jadwal' => $jadwal,
            'data_guru' => $data_guru,
            'data_siswa' => $data_siswa,
        ]);
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
        $request->validate([
            'tanggal' => 'required|date',
            'absensi' => 'required|array',
            'absensi.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $jadwal = Jadwal::first();

        $absensi = Absensi::create([
            'id_jadwal' => $jadwal->id,
            'id_guru' => $jadwal->id_guru,
            'tanggal' => $request->tanggal,
        ]);

        foreach ($request->absensi as $id_siswa => $status) {
            DetailAbsensi::create([
                'id_absensi' => $absensi->id,
                'id_siswa' => $id_siswa,
                'status' => $status,
            ]);
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
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
        $jadwal = Jadwal::all();
        $data_guru = DataGuru::all();
        $data_siswa = DataSiswa::all();

        $absensi = Absensi::findOrFail($id); // ambil data absensi utama
        $detail_absensi = DetailAbsensi::where('id_absensi', $id)->get(); // ambil detail absensi siswa

        return view('page.absensi.edit')->with([
            'jadwal' => $jadwal,
            'data_guru' => $data_guru,
            'data_siswa' => $data_siswa,
            'absensi' => $absensi,
            'detail_absensi' => $detail_absensi,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->tanggal = $request->tanggal;
        $absensi->save();

        // Hapus detail lama, lalu simpan ulang (jika perlu)
        DetailAbsensi::where('id_absensi', $id)->delete();

        foreach ($request->absensi as $id_siswa => $status) {
            DetailAbsensi::create([
                'id_absensi' => $absensi->id,
                'id_siswa' => $id_siswa,
                'status' => $status,
            ]);
        }

        return redirect()->route('absensi.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function print($id)
    {

        \Carbon\Carbon::setLocale('id');

        $absensi = Absensi::with([
            'guru',
            'jadwal.matpel',
            'jadwal.kelas',
            'detailabsensi.siswa'  // ← perbaikan di sini
        ])->findOrFail($id);

        return view('page.absensi.print', compact('absensi'));
    }
}
