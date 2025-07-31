<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $dataguru = DataGuru::paginate(10);
            return view('page.dataguru.index', compact('dataguru'));
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
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir'),
            ];

            $exists = \App\Models\DataGuru::where('nip', $request->nip)->exists();

            if ($exists) {
                return redirect()->back()->with('nip_exists', 'Guru tersebut sudah terdaftar!');
            }

            \App\Models\DataGuru::create($data);

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Guru Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
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
                'nip' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'tgl_lahir' => 'required|date',
            ]);

            $existing = \App\Models\DataGuru::where('nip', $request->nip)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                return redirect()->back()->with('nip_exists', 'Guru dengan NIP tersebut sudah terdaftar!');
            }

            $guru = \App\Models\DataGuru::findOrFail($id);
            $guru->update($data);

            return redirect()
                ->route('dataguru.index')
                ->with('message_update', 'Data Guru Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataGuru::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }
}
