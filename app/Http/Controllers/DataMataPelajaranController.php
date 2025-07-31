<?php

namespace App\Http\Controllers;

use App\Models\DataMatpel;
use Illuminate\Http\Request;

class DataMataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $datamatpel = DataMatpel::paginate(5);
            return view('page.datamatpel.index', compact('datamatpel'));
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
            $data = $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            // DataMatpel::create($data);

            $exists = \App\Models\DataMatpel::where('nama', $request->nama)
                ->exists();

            if ($exists) {
                return redirect()->back()->with('message_exists', 'Mata pelajaran tersebut sudah terdaftar!');
            }

            \App\Models\DataMatpel::create([
                'nama' => $request->nama,
            ]);

            return redirect()->route('datamatpel.index')->with([
                'alert' => 'success',
                'message_insert' => 'Data mata pelajaran berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('datamatpel.index')->with([
                'alert' => 'error',
                'message' => 'Gagal menambahkan mata pelajaran: ' . $e->getMessage(),
            ]);
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
                'nama' => 'required|string|max:255',
            ]);

            // $mapel = DataMatpel::findOrFail($id);
            // $mapel->update($data);

            $existing = \App\Models\DataMatpel::where('nama', $request->nama)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                return redirect()->back()->with('message_exists', 'Mata pelajaran tersebut sudah terdaftar!');
            }

            $data = \App\Models\DataMatpel::findOrFail($id);
            $data->update([
                'nama' => $request->nama
            ]);


            return redirect()->route('datamatpel.index')->with([
                'alert' => 'success',
                'message_update' => 'Data mata pelajaran berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('datamatpel.index')->with([
                'alert' => 'error',
                'message' => 'Gagal memperbarui mata pelajaran: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $mapel = DataMatpel::findOrFail($id);
            $mapel->delete();

            return redirect()->route('datamatpel.index')->with([
                'alert' => 'success',
                'message' => 'Data mata pelajaran berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('datamatpel.index')->with([
                'alert' => 'error',
                'message' => 'Gagal menghapus mata pelajaran: ' . $e->getMessage(),
            ]);
        }
    }
}
