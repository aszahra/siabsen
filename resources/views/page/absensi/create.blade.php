<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ABSENSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                ABSEN MATA PELAJARAN
                            </div>
                        </div>
                    </div>
                    {{-- FORM INPUTAN --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('absensi.store') }}">
                            @csrf

                            {{-- PILIH JADWAL --}}
                            <div class="mb-5 w-full">
                                <label for="id_jadwal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                    Jadwal</label>
                                <select id="id_jadwal" name="id_jadwal" class="form-select w-full rounded-md">
                                    <option value="" disabled selected>Pilih Jadwal...</option>
                                    @foreach ($jadwal as $j)
                                        <option value="{{ $j->id }}" data-guru="{{ $j->guru->nama }}"
                                            data-guru-id="{{ $j->guru->id }}" data-matpel="{{ $j->matpel->nama }}"
                                            data-matpel-id="{{ $j->matpel->id }}"
                                            data-kelas="{{ $j->kelas->tingkat }}{{ $j->kelas->sub_kelas }}"
                                            data-kelas-id="{{ $j->kelas->id }}">
                                            {{ $j->matpel->nama }} -
                                            {{ $j->kelas->tingkat }}{{ $j->kelas->sub_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- GURU, MAPEL, KELAS DISPLAY --}}
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guru</label>
                                    <input type="text" id="display_guru"
                                        class="form-input w-full rounded-md bg-gray-200" readonly>
                                    <input type="hidden" name="id_guru" id="id_guru">
                                </div>
                                <div class="mb-5 w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                                        Pelajaran</label>
                                    <input type="text" id="display_matpel"
                                        class="form-input w-full rounded-md bg-gray-200" readonly>
                                    <input type="hidden" name="id_matpel" id="id_matpel">
                                </div>
                                <div class="mb-5 w-full">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                    <input type="text" id="display_kelas"
                                        class="form-input w-full rounded-md bg-gray-200" readonly>
                                    <input type="hidden" name="id_kelas" id="id_kelas">
                                </div>
                            </div>

                            {{-- TANGGAL & WAKTU --}}
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="waktu_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                        Mulai</label>
                                    {{-- <select id="waktu_mulai" name="waktu_mulai" class="form-select w-full rounded-md"
                                        disabled selection>
                                        @foreach ($jadwal as $j)
                                            <option value="{{ $j->id }}">{{ $j->waktu_selesai }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <input type="time" name="waktu_mulai" id="waktu_mulai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="waktu_selesai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                        Selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                            </div>

                            {{-- DAFTAR SISWA --}}
                            <div class="mb-5 w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daftar
                                    Siswa</label>
                                <div class="overflow-x-auto max-h-96 border rounded-lg p-4 bg-white dark:bg-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2 text-left font-bold">No</th>
                                                <th class="px-4 py-2 text-left font-bold">Nama</th>
                                                <th class="px-4 py-2 text-left font-bold">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_siswa as $i => $siswa)
                                                <tr>
                                                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                                                    <td class="px-4 py-2">{{ $siswa->nama }}</td>
                                                    <td class="px-4 py-2">
                                                        <select name="absensi[{{ $siswa->id }}]"
                                                            class="form-select w-full rounded-md">
                                                            <option value="" disabled selected>Pilih</option>
                                                            <option value="hadir">Hadir</option>
                                                            <option value="izin">Izin</option>
                                                            <option value="sakit">Sakit</option>
                                                            <option value="alpa">Alpa</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- BUTTONS --}}
                            <div class="flex justify-start gap-4 mt-5">
                                <button type="submit"
                                    class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                                    Simpan
                                </button>
                                <a href="{{ route('absensi.index') }}"
                                    class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                                    Batal
                                </a>
                            </div>
                        </form>
                        <script>
                            const jadwalSelect = document.getElementById('id_jadwal');

                            jadwalSelect.addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];

                                document.getElementById('display_guru').value = selectedOption.dataset.guru;
                                document.getElementById('id_guru').value = selectedOption.dataset.guruId;

                                document.getElementById('display_matpel').value = selectedOption.dataset.matpel;
                                document.getElementById('id_matpel').value = selectedOption.dataset.matpelId;

                                document.getElementById('display_kelas').value = selectedOption.dataset.kelas;
                                document.getElementById('id_kelas').value = selectedOption.dataset.kelasId;

                                // Tampilkan hanya siswa dari kelas yang dipilih
                                const semuaSiswa = document.querySelectorAll('.siswa-row');
                                const idKelasDipilih = selectedOption.dataset.kelasId;

                                semuaSiswa.forEach(row => {
                                    row.style.display = 'none';
                                });

                                semuaSiswa.forEach(row => {
                                    if (row.dataset.kelasId === idKelasDipilih) {
                                        row.style.display = '';
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
