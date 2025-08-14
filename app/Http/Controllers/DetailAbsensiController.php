<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataSiswa;
use App\Models\DetailAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailAbsensiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $idAbsensi = $request->id_absensi;
            $absensi = Absensi::with(['guru', 'matpel', 'kelas'])
                ->findOrFail($idAbsensi);
            $siswa = DataSiswa::where('id_kelas', $absensi->kelas->id)->get();
            return view('page.detail.index', compact('absensi', 'siswa'));
            // $absensi = Absensi::all();
            // $siswa = DataSiswa::all();
            // $detail = DetailAbsensi::with('siswa', 'absensi')->get();

            // return view('page.detail.index', compact('detail', 'absensi', 'siswa'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }


    // Menampilkan form input detail absensi
    public function create($absensi_id)
    {
        try {
            $absensi = Absensi::findOrFail($absensi_id);
            $siswa = DataSiswa::all();

            return view('detailabsensi.create', compact('absensi', 'siswa'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_absensi' => 'required|exists:absensi,id',
                'id_siswa'   => 'required|array',
                'status'     => 'required|array',
            ]);

            $absensi = Absensi::findOrFail($request->id_absensi);

            foreach ($request->id_siswa as $id_siswa) {
                if (!isset($request->status[$id_siswa])) continue;

                foreach ($request->tanggal as $tgl) {
                    DetailAbsensi::updateOrCreate(
                        [
                            'id_absensi' => $absensi->id,
                            'id_siswa'   => $id_siswa,
                            'tanggal'    => $tgl,
                        ],
                        [
                            'status' => $request->status[$id_siswa],
                        ]
                    );
                }
            }

            return redirect()->route('absensi.index')
                ->with('message_insert', 'Detail absensi berhasil disimpan.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    // public function edit(Request $request, $id_absensi)
    // {
    //     $tanggal = $request->query('tanggal'); // ambil tanggal dari query string
    //     $absensi = Absensi::findOrFail($id_absensi);

    //     // ambil siswa yang punya detail di tanggal itu
    //     $siswa = $absensi->detailAbsensi()->where('tanggal', $tanggal)->get();

    //     return view('page.detail.edit', compact('absensi', 'siswa', 'tanggal'));
    // }

    public function edit(Request $request, DetailAbsensi $detailabsensi)
    {
        try {
            $tanggal = $request->query('tanggal'); // ambil tanggal dari query string

            // Load relasi absensi & siswa
            $detailabsensi->load(['absensi.guru', 'absensi.matpel', 'absensi.kelas']);

            $absensi = $detailabsensi->absensi; // <- tambahkan ini

            // Ambil semua siswa yang punya detail absensi di tanggal itu
            $siswa = $absensi->detailabsensi()
                ->whereDate('tanggal', $tanggal)
                ->with('siswa')
                ->get();

            return view('page.detail.edit', compact('absensi', 'tanggal', 'siswa'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }



    public function update(Request $request, $id_absensi)
    {
        try {
            $absensi = Absensi::findOrFail($id_absensi);

            foreach ($request->id_siswa as $id_siswa) {
                if (!isset($request->status[$id_siswa])) continue;

                DetailAbsensi::updateOrCreate(
                    [
                        'id_absensi' => $absensi->id,
                        'id_siswa' => $id_siswa,
                        'tanggal' => $request->tanggal
                    ],
                    [
                        'status' => $request->status[$id_siswa],
                    ]
                );
            }

            return redirect()->route('absensi.index')->with('message_insert', 'Detail absensi berhasil diperbarui.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    public function getDetail($id)
    {
        $detail = DetailAbsensi::with('siswa')
            ->where('id_absensi', $id)
            ->get();

        return response()->json($detail);
    }

    // public function print(DetailAbsensi $detailabsensi)
    // {
    //     // Load relasi supaya bisa dipakai di view
    //     $detailabsensi->load(['absensi.guru', 'absensi.matpel', 'absensi.kelas', 'siswa', 'absensi.detailabsensi']);

    //     // Kirim ke view dengan nama variabel 'detail' supaya Blade tetap bisa pakai $detail
    //     return view('page.detail.print', [
    //         'detail' => $detailabsensi
    //     ]);
    // }

    public function print(Request $request, DetailAbsensi $detailabsensi)
    {
        try {
            $tanggal = $request->query('tanggal');

            $detailabsensi->load(['absensi.guru', 'absensi.matpel', 'absensi.kelas']);

            $detailSiswa = $detailabsensi->absensi->detailabsensi()
                ->whereDate('tanggal', $tanggal)
                ->with('siswa')
                ->get();

            return view('page.detail.print', [
                'detail' => $detailabsensi,
                'tanggal' => $tanggal,
                'detailSiswa' => $detailSiswa,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
