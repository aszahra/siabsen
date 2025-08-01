<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2,
        .header h3,
        .header p {
            margin: 2px 0;
        }

        .info-wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-left,
        .info-right {
            display: grid;
            grid-template-columns: 110px auto;
            gap: 4px 10px;
            font-size: 13px;
            line-height: 1.3;
            width: 48%;
        }

        .info-left p,
        .info-right p {
            margin: 0;
            display: contents;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        table,
        th,
        td {
            border: 1px solid #333;
        }

        th,
        td {
            padding: 6px 8px;
            text-align: center;
        }

        .footer-info {
            text-align: center;
            font-style: italic;
            font-size: 12px;
            margin-top: 30px;
        }

        @media print {
            .no-print {
                display: none;
            }

            .footer-info {
                position: fixed;
                bottom: 20px;
                left: 0;
                right: 0;
            }
        }
    </style>

</head>

<body>
    {{-- Kop Surat --}}
    <div class="header" style="display: flex; align-items: center; gap: 20px;">
    <img src="{{ asset('images/logo.png') }}" alt="Logo Sekolah" width="80">
        <div style="flex: 1; text-align: center;">
            <h3>PEMERINTAH KABUPATEN TASIKMALAYA</h3>
            <h2>SMP NEGERI 2 CIGALONTANG</h2>
            <p>Sirnaraja, Kec. Cigalontang, Kabupaten Tasikmalaya, Jawa Barat 46463</p>
        </div>
    </div>
    <hr style="border: 2px solid black; margin-top: 10px;">


    <h3 style="text-align: center;">LAPORAN ABSENSI</h3>

    {{-- Info Detail --}}
    <div class="info-wrapper">
        <div class="info-left">
            <p><strong>Tanggal</strong></p>
            <p>: {{ \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('d F Y') }}</p>
            <p><strong>Guru</strong></p>
            <p>: {{ $absensi->guru->nama ?? '-' }}</p>
        </div>
        <div class="info-right">
            <p><strong>Mata Pelajaran</strong></p>
            <p>: {{ $absensi->jadwal->matpel->nama ?? '-' }}</p>
            <p><strong>Kelas</strong></p>
            <p>: {{ $absensi->jadwal->kelas->tingkat ?? '' }}{{ $absensi->jadwal->kelas->sub_kelas ?? '' }}</p>
        </div>
    </div>

    {{-- Tabel Absensi --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi->detailabsensi as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->siswa->nama }}</td>
                    <td>{{ ucfirst($detail->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Info Cetak --}}
    <p class="footer-info">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i') }}
    </p>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">🖨️ Cetak</button>
        <a href="{{ route('absensi.index') }}" style="margin-left: 15px;">← Kembali</a>
    </div>

</body>



</html>
