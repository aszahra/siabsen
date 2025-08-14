<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $datauser = User::create([
                'name' => $request->input('nama'),
                'email' => strtolower(str_replace(' ', '', $request->input('nama'))) . '@gmail.com',
                'password' => Hash::make($request->nip),
                'role' => 'Guru'
            ]);

            $data = [
                'nip' => $request->input('nip'),
                'id_user' => $datauser->id,
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'no_telp' => $request->input('no_telp'),
                'agama' => $request->input('agama'),
                'alamat' => $request->input('alamat'),
                'statuss' => $request->input('statuss'),
            ];

            $exists = DataGuru::where('nip', $request->nip)->exists();

            if ($exists) {
                return redirect()->back()->with('nip_exists', 'Guru tersebut sudah terdaftar!');
            }


            DataGuru::create($data);

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Guru Berhasil Ditambahkan');
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
                'nip' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required|date',
                'no_telp' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'statuss' => 'required',
            ]);

            $existing = DataGuru::where('nip', $request->nip)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                return redirect()->back()->with('nip_exists', 'Guru dengan NIP tersebut sudah terdaftar!');
            }

            $guru = DataGuru::findOrFail($id);
            $guru->update($data);

            return redirect()
                ->route('dataguru.index')
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
            $data = DataGuru::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Guru Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
