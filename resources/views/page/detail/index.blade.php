<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight text-center">
            {{ __('INPUT ABSENSI SMP NEGERI 2 CIGALONTANG') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        {{-- Form Input Absensi --}}
        <form action="{{ route('detailabsensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_absensi" value="{{ $absensi->id }}">

            {{-- Informasi Guru & Mata Pelajaran --}}
            <div class="flex flex-col md:flex-row gap-4 md:gap-5">
                <div class="mb-4 md:mb-5 w-full flex flex-col md:flex-row md:items-center gap-2">
                    <label for="tanggal" class="text-sm font-medium md:w-32">
                        Tanggal
                    </label>
                    <input type="date" id="tanggal" name="tanggal[]"
                        value="{{ $absensi->tanggal ?? now()->format('Y-m-d') }}"
                        class="bg-gray-50 border border-gray-300 rounded-lg p-2 w-full" required />
                </div>
                <div class="mb-4 md:mb-5 w-full flex flex-col md:flex-row md:items-center gap-2">
                    <label for="nama_guru" class="md:w-32">Nama Guru</label>
                    <input type="text" id="nama_guru" value="{{ $absensi->guru->nama }}" readonly
                        class="bg-gray-100 border border-gray-300 rounded-lg p-2 w-full" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-4 md:gap-5">
                <div class="mb-4 md:mb-5 w-full flex flex-col md:flex-row md:items-center gap-2">
                    <label for="kelas" class="md:w-32">Kelas</label>
                    <input type="text" id="kelas"
                        value="{{ $absensi->kelas->tingkat }}{{ $absensi->kelas->sub_kelas }}" readonly
                        class="bg-gray-100 border border-gray-300 rounded-lg p-2 w-full" />
                </div>
                <div class="mb-4 md:mb-5 w-full flex flex-col md:flex-row md:items-center gap-2">
                    <label for="matpel" class="md:w-32">Mata Pelajaran</label>
                    <input type="text" id="matpel" value="{{ $absensi->matpel->nama }}" readonly
                        class="bg-gray-100 border border-gray-300 rounded-lg p-2 w-full" />
                </div>
            </div>

            {{-- Daftar Siswa --}}
            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="min-w-full border border-gray-300 bg-white">
                    <thead>
                        <tr
                            class="bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm uppercase tracking-wider">
                            <th class="border px-2 py-2 md:px-4 md:py-3 text-center">No</th>
                            <th class="border px-2 py-2 md:px-4 md:py-3">Nama Siswa</th>
                            <th class="border px-2 py-2 md:px-4 md:py-3 text-center">Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($siswa as $index => $s)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50">
                                <td class="border px-2 py-2 md:px-4 md:py-3 text-center font-semibold">
                                    {{ $index + 1 }}</td>
                                <td class="border px-2 py-2 md:px-4 md:py-3">
                                    {{ $s->nama }}
                                    {{-- Id Siswa yang akan dikirim ke controller --}}
                                    <input type="hidden" name="id_siswa[]" value="{{ $s->id }}">
                                </td>
                                <td class="border px-2 py-2 md:px-4 md:py-3 text-center">
                                    <select name="status[{{ $s->id }}]"
                                        class="border rounded-lg px-1 py-1 md:px-2 md:py-1 text-sm md:text-base focus:ring-2 focus:ring-blue-400 focus:outline-none w-full md:w-auto">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alpa">Alpa</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-center md:justify-start">
                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4
                    focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center ml-4">
                    Simpan
                </button>
                <a href="{{ route('absensi.index') }}"
                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center ml-4">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
