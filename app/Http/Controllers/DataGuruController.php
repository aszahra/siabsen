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
            $dataguru = DataGuru::paginate(5);
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
        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'tgl_lahir' => $request->input('tgl_lahir'),
        ];

        DataGuru::create($data);

        return back()->with('message_insert', 'Data Guru Sudah Di Tambahkan');
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
        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'tgl_lahir' => $request->input('tgl_lahir'),
        ];


        $datas = DataGuru::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Guru Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Dataguru::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }
}
