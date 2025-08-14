<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $nama = DataKelas::paginate(10);
            return view('page.datakelas.index', compact('nama'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'tingkat' => $request->input('tingkat'),
                'sub_kelas' => $request->input('sub_kelas')
            ];

            // DataKelas::create($data);

            $exists = DataKelas::where('tingkat', $request->tingkat)
                ->where('sub_kelas', $request->sub_kelas)
                ->exists();

            if ($exists) {
                return redirect()->back()->with('message_exists', 'Kelas tersebut sudah terdaftar!');
            }

            DataKelas::create([
                'tingkat' => $request->tingkat,
                'sub_kelas' => $request->sub_kelas,
            ]);

            return redirect()
                ->route('datakelas.index')
                ->with('message_insert', 'Data Kelas Berhasil Ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
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
            $data = $request->validate([
                'tingkat' => 'required|string|max:255',
                'sub_kelas' => 'required|string|max:255',
            ]);

            // $datas = DataKelas::findOrFail($id);
            // $datas->update($data);

            $existing = DataKelas::where('tingkat', $request->tingkat)
                ->where('sub_kelas', $request->sub_kelas)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                return redirect()->back()->with('message_exists', 'Kelas tersebut sudah terdaftar!');
            }

            $data = DataKelas::findOrFail($id);
            $data->update([
                'tingkat' => $request->tingkat,
                'sub_kelas' => $request->sub_kelas,
            ]);

            return redirect()
                ->route('datakelas.index')
                ->with('message_insert', 'Data Kelas Berhasil Diupdate');
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
            $kelas = DataKelas::findOrFail($id);
            $kelas->delete();

            return redirect()->route('datakelas.index')->with([
                'alert' => 'success',
                'message' => 'Data Kelas Berhasil Dihapus!',
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
