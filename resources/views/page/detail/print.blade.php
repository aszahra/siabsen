<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Absensi</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2,
        .header h3,
        .header p {
            margin: 0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 130px auto 160px auto;
            row-gap: 5px;
            column-gap: 20px;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid #333;
        }

        th,
        td {
            padding: 6px 8px;
            /* dikurangi supaya tinggi baris lebih pendek */
            text-align: center;
        }

        .footer-info {
            text-align: center;
            font-style: italic;
            font-size: 10px;
            margin-top: 30px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="header" style="display: flex; align-items: center; gap: 20px;">
        <img src="{{ asset('asset/kab_tasikmalaya.png') }}" alt="Logo Kabupaten" width="70">
        <div style="flex: 1; text-align: center; font-size: 16px">
            <h3>PEMERINTAH KABUPATEN TASIKMALAYA</h3>
            <h2>SMP NEGERI 2 CIGALONTANG</h2>
            <p>Sirnaraja, Kec. Cigalontang, Kabupaten Tasikmalaya, Jawa Barat</p>
        </div>
        <img src="{{ asset('asset/logo-smpn2.png') }}" alt="Logo Sekolah" width="50">
    </div>
    <hr style="border: 2px solid black; margin-top: 10px;">

    <h3 style="text-align: center; margin-top: 15px;">ABSENSI SISWA</h3>

    <div class="info-grid">
        <div><strong>Tanggal</strong></div>
        <div>: {{ \Carbon\Carbon::parse($detail->tanggal)->translatedFormat('d F Y') ?? '-' }}</div>
        <div><strong>Mata Pelajaran</strong></div>
        <div>: {{ $detail->absensi->matpel->nama ?? '-' }}</div>

        <div><strong>Guru</strong></div>
        <div>: {{ $detail->absensi->guru->nama ?? '-' }}</div>
        <div><strong>Kelas</strong></div>
        <div>: {{ $detail->absensi->kelas->tingkat ?? '-' }}{{ $detail->absensi->kelas->sub_kelas ?? '-' }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kehadiran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailSiswa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->siswa->nis ?? '-' }}</td>
                    <td>{{ $item->siswa->nama ?? '-' }}</td>
                    <td>{{ $item->siswa->jenis_kelamin ?? '-' }}</td>
                    <td>{{ ucfirst($item->status ?? '-') }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div style="text-align: right; margin-top: 25px; margin-right: 40px">
        <div style="display: inline-block; text-align: left;">
            <p style="margin: 0;">Tasikmalaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p style="margin-top: 5px;">Guru Mata Pelajaran</p>
            <p style="margin-top: 50px; font-weight: bold;">
                {{ $detail->absensi->guru->nama ?? '-' }}
            </p>
            <p>NIP. {{ $detail->absensi->guru->nip ?? '-' }}</p>
        </div>
    </div>

    <p class="footer-info" style="color: #555;">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i') }}
    </p>

    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()">🖨 Cetak</button>
        <a href="{{ route('absensi.index') }}" style="margin-left: 15px;">← Kembali</a>
    </div>

</body>

</html>
