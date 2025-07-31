<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMatpel;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = DataGuru::all();
        $matpel = DataMatpel::all();
        $kelas = DataKelas::all();
        $jadwal = Jadwal::paginate(10);
        // $client = Client::all();
        return View('page.jadwal.index')->with([
            'jadwal' => $jadwal,
            'guru' => $guru,
            'matpel' => $matpel,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = DataGuru::all();
        $matpel = DataMatpel::all();
        $kelas = DataKelas::all();
        // $kode_invoice = Transaksi::createCode();
        return view('page.jadwal.create')->with([
            'guru' => $guru,
            'matpel' => $matpel,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jadwal::create([
            'id_guru' => $request->id_guru,
            'id_matpel' => $request->id_matpel,
            'id_kelas' => $request->id_kelas,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);


        return redirect()->route('jadwal.index')->with('success', 'Data Berhasil Ditambahkan');
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
                'id_guru' => $request->input('id_guru'),
                'id_matpel' => $request->input('id_matpel'),
                'id_kelas' => $request->input('id_kelas'),
                'hari' => $request->input('hari'),
                'waktu_mulai' => $request->input('waktu_mulai'),
                'waktu_selesai' => $request->input('waktu_selesai'),
            ];

            $datas = Jadwal::findOrFail($id);
            $datas->update($data);

            return redirect()
                ->route('jadwal.index')
                ->with('message_insert', 'Jadwal Berhasil Diupdate');
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
            $data = Jadwal::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Jadwal Berhasil Dihapus!');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            // return view('error.index');
        }
    }
}
