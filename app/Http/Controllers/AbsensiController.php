<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataGuru;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = DataGuru::all();
        $jadwal = Jadwal::all();
        $absensi = Absensi::paginate(10);
        // $client = Client::all();
        return View('page.absensi.index')->with([
            'jadwal' => $jadwal,
            'guru' => $guru,
            'absensi' => $absensi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
