<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMatpel;
use App\Models\DataSiswa;
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
